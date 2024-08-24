<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $cart = $user->carts()->availableItem()->with(['product.image_thumbnail'])->get();
        foreach ($cart as $item) {
            if ($item->product->stock < $item->quantity) {
                $item->quantity = $item->product->stock;
                $item->save();
            }
        }

        $total = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $itemNotAvailable = $user->carts()->unavailableItem()->with(
            [
            'product' => function ($query) {
                $query->withTrashed()->with('image_thumbnail');
            }
        ])->get();

        return view('cart', compact(['user', 'cart', 'total', 'itemNotAvailable']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        if ($request->quantity > $product->stock) {
            return redirect()->route('product.detail', $id)->with('toast-error', 'Product out of stock');
        } else {
            if ($user->carts()->where('product_id', $id)->exists()) {
                $item = $user->carts()->where('product_id', $id)->first();
                if ($item->quantity + $request->quantity > $product->stock) {
                    return redirect()->route('product.detail', $id)->with('toast-error', 'This product has been added to cart with max quantity');
                }
                $item->quantity += $request->quantity;
                $item->save();
            } else {
                $user->cartProducts()->attach($product, ['quantity' => $request->quantity]);
            }
            return redirect()->route('product.detail', $id)->with('toast-success', 'Product added to cart successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        if ($user->carts()->where('product_id', $id)->exists()) {
            $item = $user->carts()->where('product_id', $id)->first();
            if ($request->quantity > $product->stock) {
                return redirect()->route('cart')->with('toast-error', 'Product out of stock');
            }
            $item->quantity = $request->quantity;
            $item->save();
            return redirect()->route('cart')->with('toast-success', 'Product updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $product = Product::withTrashed()->find($id);
        if (!$product) {
            abort(404);
        }
        if ($user->carts()->where('product_id', $id)->exists()) {
            $user->carts()->where('product_id', $id)->delete();
            return redirect()->route('cart')->with('toast-success', 'Product deleted successfully');
        } else {
            return redirect()->route('cart')->with('toast-error', 'Product not found in cart');
        }
    }

    public function clear()
    {
        $user = Auth::user();
        $user->carts()->whereHas('product', function ($query) {
            $query->withTrashed()
                ->where(function ($query) {
                    $query->where('stock', 0)->whereNull('deleted_at');
                })->orWhereNotNull('deleted_at');
        })->delete();

        return redirect()->route('cart')->with('toast-success', 'Cart cleared successfully');
    }
}
