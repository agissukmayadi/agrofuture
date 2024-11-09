<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Orders';

        $ordersQuery = Auth::user()->orders()->with([
            'orderDetails' => function ($query) {
                $query->with([
                    'product' => function ($query) {
                        $query->withTrashed()
                            ->with('image_thumbnail');
                    }
                ]);
            }
        ]);

        if ($request->has('status') && !empty($request->status)) {
            $orders = $ordersQuery->where('status', $request->status);
        }

        $orders = $ordersQuery->latest()->paginate(10)->withQueryString();

        if ($request->has('order_id') && !empty($request->order_id)) {
            return redirect()->route('order.detail', $request->order_id);
        }
        return view('orders.index', compact('title', 'orders'));
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $title = 'Order Details';
        $order = $user->orders()->with([
            'orderDetails' => function ($query) {
                $query->with([
                    'product' => function ($query) {
                        $query->withTrashed()
                            ->with('image_thumbnail');
                    }
                ]);
            }
        ])->with('shipment')->where('id', $id)->first();
        if (!$order) {
            abort(404);
        }

        $subtotal = $order->orderDetails->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });


        return view('orders.detail', compact(['title', 'order', 'subtotal']));
    }

    public function cancel(Request $request, string $id)
    {
        $request->validate([
            'note_cancelled' => ['required', 'string']
        ]);
        $user = Auth::user();
        $order = $user->orders()->with([
            'orderDetails' => function ($query) {
                $query->with([
                    "product" => function ($query) {
                        $query->withTrashed();
                    }
                ]);
            }
        ])->where('id', $id)->first();
        $order->cancelled_at = now();
        $order->note_cancelled = "Customer :" . $request->note_cancelled;
        $order->status = 'CANCELLED';
        $order->save();

        foreach ($order->orderDetails as $item) {
            $product = $item->product;
            $product->stock += $item->quantity;
            $product->save();
        }

        return redirect()->route('orders')->with('success', 'Order Cancelled');
    }

    public function confirm(string $id)
    {
        $user = Auth::user();
        $order = $user->orders()->where('id', $id)->first();
        $order->success_at = now();
        $order->status = 'SUCCESS';
        $order->save();
        return redirect()->route('orders')->with('success', 'Order Arrived');
    }
}
