<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function get_province()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get('https://api.rajaongkir.com/starter/province');

        return response()->json($response->json());
    }

    public function get_city(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get("https://api.rajaongkir.com/starter/city?province=$request->province");

        return response()->json($response->json());
    }

    public function get_cost(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->post("https://api.rajaongkir.com/starter/cost", [
                    'origin' => env('RAJAONGKIR_ORIGIN_ID'),
                    'destination' => $request->destination,
                    'weight' => $request->weight,
                    'courier' => $request->courier
                ]);
        return response()->json($response->json());
    }

    public function midtrans_callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        $order = Order::find($request->order_id);

        if ($hashed === $request->signature_key) {
            $order = Order::find($request->order_id);
            if ($request->transaction_status == "capture" || $request->transaction_status == "settlement") {
                $order->paid_at = now();
                $order->status = "PAID";
            } elseif ($request->transaction_status == "deny" || $request->transaction_status == "cancel" || $request->transaction_status == "expire" || $request->transaction_status == "failure") {
                foreach ($order->orderDetails as $item) {
                    $product = $item->product;
                    $product->stock += $item->quantity;
                    $product->save();
                }
                if ($request->transaction_status == "deny") {
                    $order->note_cancelled = "Payment : Order Payment is denied";
                } elseif ($request->transaction_status == "cancel") {
                    $order->note_cancelled = "Payment : Order Payment is canceled";
                } elseif ($request->transaction_status == "expire") {
                    $order->note_cancelled = "Payment : Order Payment is expired";
                } elseif ($request->transaction_status == "failure") {
                    $order->note_cancelled = "Payment : Order Payment is failed";
                }
                $order->failed_at = now();
                $order->status == "CANCELLED";
            }
            $order->save();
        }
    }
}