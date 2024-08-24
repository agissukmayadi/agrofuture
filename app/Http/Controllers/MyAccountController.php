<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class MyAccountController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('my-account.index', $data);
    }

    public function orders(Request $request)
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
            return redirect()->route('my-account.order.detail', $request->order_id);
        }
        return view('my-account.orders', compact('title', 'orders'));
    }

    public function order_detail(string $id)
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


        return view('my-account.order-detail', compact(['title', 'order', 'subtotal']));
    }

    public function order_cancel(Request $request, string $id)
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
        $order->note_cancelled = $request->note_cancelled;
        $order->status = 'CANCELLED';
        $order->save();

        foreach ($order->orderDetails as $item) {
            $product = $item->product;
            $product->stock += $item->quantity;
            $product->save();
        }

        return redirect()->route('my-account.orders')->with('success', 'Order Cancelled');
    }

    public function order_confirm(string $id)
    {
        $user = Auth::user();
        $order = $user->orders()->where('id', $id)->first();
        $order->success_at = now();
        $order->status = 'SUCCESS';
        $order->save();
        return redirect()->route('my-account.orders')->with('success', 'Order Arrived');
    }

    public function edit_account()
    {
        $data = [
            'title' => 'Edit Account'
        ];
        return view('my-account.edit-account', $data);
    }

    public function action_edit_account(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($request->password !== null || $request->current_password !== null) {
            $request->validate([
                'current_password' => ['required'],
                'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()->mixedCase()],
            ]);

            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return back()->withErrors([
                    'current_password' => __('auth.password'),
                ]);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('my-account.edit-account')->with('success', 'Account has been updated');
    }


}