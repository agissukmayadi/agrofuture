<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function midtransCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            $order = Order::find($request->order_id);

            if ($request->transaction_status == "capture" || $request->transaction_status == "settlement") {
                $order->paid_at = now();
                $order->status = "PAID";
            } elseif ($request->transaction_status == "pending") {
                $order->status == "PENDING";
            } elseif ($request->transaction_status == "deny" || $request->transaction_status == "cancel" || $request->transaction_status == "expire" || $request->transaction_status == "failure") {
                foreach ($order->orderDetails as $item) {
                    $product = $item->product;
                    $product->stock += $item->quantity;
                    $product->save();
                }
                if ($request->transaction_status == "deny") {
                    $order->note_failed = "Order Payment is denied";
                } elseif ($request->transaction_status == "cancel") {
                    $order->note_failed = "Order Payment is canceled";
                } elseif ($request->transaction_status == "expire") {
                    $order->note_failed = "Order Payment is expired";
                } elseif ($request->transaction_status == "failure") {
                    $order->note_failed = "Order Payment is failed";
                }
                $order->failed_at = now();
                $order->status == "FAILED";
            }
            $order->save();
        }
    }
}