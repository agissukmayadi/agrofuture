<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $cart = $user->carts()->availableItem()->with('product')->get();

        $subtotal = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $weight = $cart->sum(function ($item) {
            return $item->product->weight * $item->quantity;
        });

        return view('checkout', compact(['cart', 'subtotal', 'weight']));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'courier' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:255'],
            'estimate' => ['required', 'string', 'max:255'],
            'cost' => ['required', 'numeric', 'min:0'],
        ]);

        $user = Auth::user();
        $cart = $user->carts()->availableItem()->with(['product'])->get();

        // Gunakan DB::transaction untuk membungkus seluruh operasi
        DB::beginTransaction();
        try {
            // Hitung total harga produk
            $productPrice = $cart->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // Hitung total pembayaran
            $total = $productPrice + $request->cost;

            // Buat order baru
            $order = $user->orders()->create([
                'total' => $total
            ]);

            // Buat pengiriman baru
            $order->shipment()->create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'courier' => $request->courier,
                'service' => $request->service,
                'estimate' => $request->estimate,
                'cost' => $request->cost
            ]);

            // Proses item dalam keranjang
            foreach ($cart as $item) {
                // Cek apakah stok cukup
                if ($item->quantity > $item->product->stock) {
                    // Jika stok tidak cukup, lempar Exception untuk rollback transaksi
                    throw new \Exception('Product out of stock');
                }

                // Buat detail order
                $order->orderDetails()->create([
                    'product_id' => $item->product_id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'weight' => $item->product->weight
                ]);

                // Kurangi stok produk
                $item->product->decrement('stock', $item->quantity);

                // Hapus item dari keranjang
                $item->delete();
            }

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $payload = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total // Pastikan total ini sudah termasuk shipping cost
                ],
                'customer_details' => [
                    'first_name' => $order->shipment->name,
                    'phone' => $order->shipment->phone
                ],
                'item_details' => $cart->map(function ($item) {
                    return [
                        'id' => $item->product->id,
                        'price' => $item->product->price,
                        'quantity' => $item->quantity,
                        'name' => $item->product->name
                    ];
                })->toArray()
            ];

            // Tambahkan shipping cost sebagai item terpisah
            $payload['item_details'][] = [
                'id' => 'SHIPPING',
                'price' => $order->shipment->cost,
                'quantity' => 1,
                'name' => 'Shipping Cost'
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $order->snap_token = $snapToken;
            $order->save();

            // Commit transaksi jika semua berhasil
            DB::commit();

            return redirect()->route('order.detail', $order->id)->with('directPay', true);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Redirect dengan pesan error
            return redirect()->route('cart')->with('toast-error', $e->getMessage());
        }
    }

}