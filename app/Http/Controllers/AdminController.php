<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;


class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return response()->view('admin.index', compact('user'));
    }

    public function categories(Request $request)
    {
        $user = Auth::user();
        $categoriesQuery = Category::query();

        if ($request->has('name') && !empty($request->name)) {
            $categoriesQuery = $categoriesQuery->where('name', 'like', '%' . $request->name . '%');
        }

        $categories = $categoriesQuery->paginate(10)->withQueryString();
        return response()->view('admin.categories.index', compact(['user', 'categories']));
    }

    public function category_store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function category_update(CategoryRequest $categoryRequest, string $id)
    {
        $data = $categoryRequest->validated();
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }
        $category->name = $data['name'];
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    public function category_destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }

    public function products(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        $productsQuery = Product::with(['category' => function($query){
            $query->withTrashed();
        }]);

        if ($request->has('name') && !empty($request->name)) {
            $productsQuery->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('category_id') && !empty($request->category_id)) {
            $productsQuery->whereHas('category', function (Builder $builder) use ($request) {
                $builder->whereIn('category_id', $request->category_id);
            });
        }

        $products = $productsQuery->paginate(10)->withQueryString();
        return response()->view('admin.products.index', compact(['user', 'categories', 'products']));
    }

    public function product_create(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        return response()->view('admin.products.create', compact(['user', 'categories']));
    }

    public function product_store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = Product::create(collect($data)->except(['image_thumbnail', 'image'])->toArray());

        if ($request->file('image_thumbnail')) {
            $fileImageThumbnail = $request->file('image_thumbnail');
            $fileImageThumbnailName = time() . '_' . $fileImageThumbnail->getClientOriginalName();

            $filePath = $fileImageThumbnail->storeAs('img/products/', $fileImageThumbnailName, 'public');
            $product->images()->create([
                'name' => $fileImageThumbnailName,
                'is_thumbnail' => true
            ]);
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $fileImage = $image;
                $fileImageName = time() . '_' . $fileImage->getClientOriginalName();

                $filePath = $fileImage->storeAs('img/products/', $fileImageName, 'public');
                $product->images()->create([
                    'name' => $fileImageName,
                    'is_thumbnail' => false
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    public function product_edit(Request $request, string $id)
    {
        $user = Auth::user();
        $categories = Category::all();
        $product = Product::with(['category', 'images'])->find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        return response()->view('admin.products.edit', compact(['user', 'categories', 'product']));
    }

    public function product_update(ProductRequest $request, string $id)
    {

        $data = $request->validated();

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        $product->update(collect($data)->except(['image_thumbnail', 'image'])->toArray());

        if ($request->file('image_thumbnail')) {
            if (Storage::disk('public')->exists('img/products/' . $product->image_thumbnail->name)) {
                Storage::disk('public')->delete('img/products/' . $product->image_thumbnail->name);
            }
            $product->image_thumbnail()->delete();

            $fileImageThumbnail = $request->file('image_thumbnail');
            $fileImageThumbnailName = time() . '_' . $fileImageThumbnail->getClientOriginalName();
            $filePath = $fileImageThumbnail->storeAs('img/products/', $fileImageThumbnailName, 'public');
            $product->images()->create([
                'name' => $fileImageThumbnailName,
                'is_thumbnail' => true
            ]);
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $fileImage = $image;
                $fileImageName = time() . '_' . $fileImage->getClientOriginalName();

                $filePath = $fileImage->storeAs('img/products/', $fileImageName, 'public');
                $product->images()->create([
                    'name' => $fileImageName,
                    'is_thumbnail' => false
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product updated successfully');

    }

    public function product_images_delete(string $id)
    {
        $productImage = ProductImage::with(['product'])->find($id);
        if (!$productImage) {
            return response()->json(['message' => 'Product image not found']);
        }
        if (Storage::disk('public')->exists('img/products/' . $productImage->name)) {
            Storage::disk('public')->delete('img/products/' . $productImage->name);
        }
        $productImage->delete();
        return response()->json(['message' => 'Product image deleted successfully']);
    }

    public function product_destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }

    public function users(Request $request)
    {
        $usersQuery = User::query();

        if ($request->has('name') && !empty($request->name)) {
            $usersQuery = $usersQuery->where('name', 'like', '%' . $request->name . '%');
        }

        $users = $usersQuery->paginate(10)->withQueryString();
        $user = Auth::user();
        return response()->view('admin.users.index', compact(['users', 'user']));
    }

    public function user_store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function user_destroy(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    public function user_update(UserRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function orders(Request $request)
    {
        $user = Auth::user();

        $ordersQuery = Order::with([
            'user' => function ($query) {
                $query->withTrashed();
            }
        ]);

        if ($request->has('invoice_number') && !empty($request->invoice_number)) {
            $ordersQuery->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }
        if ($request->has('status') && !empty($request->status)) {
            $ordersQuery->whereIn('status', $request->status);
        }

        $orders = $ordersQuery->paginate(10)->withQueryString();
        return response()->view('admin.orders.index', compact(['user', 'orders']));
    }

    public function order_detail(Request $request, $id)
    {
        $order = Order::where('id', $id)->with([
            'orderDetails' => function ($query) {
                $query->with([
                    'product' => function ($query) {
                        $query->withTrashed()
                            ->with('image_thumbnail');
                    }
                ]);
            },
            'user' => function ($query) {
                $query->withTrashed();
            }
        ])->with('shipment')->first();
        if (!$order) {
            abort(404);
        }

        $subtotal = $order->orderDetails->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return response()->view('admin.orders.detail', compact(['order', 'subtotal']));
    }

    public function order_tracking_number(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();

        $order->shipment()->update([
            'tracking_number' => $request->tracking_number
        ]);

        $order->shipped_at = now();
        $order->status = 'SHIPPED';
        $order->save();

        return redirect()->route('admin.order.detail', $id)->with('success', 'Tracking number updated successfully');
    }

    public function order_cancel(Request $request, string $id)
    {
        $request->validate([
            'note_cancelled' => ['required', 'string']
        ]);
        $order = Order::where('id', $id)->first();
        $order->cancelled_at = now();
        $order->note_cancelled = "Admin :" . $request->note_cancelled;
        $order->status = 'CANCELLED';
        $order->save();

        foreach ($order->orderDetails as $item) {
            $product = $item->product;
            $product->stock += $item->quantity;
            $product->save();
        }
        return redirect()->route('admin.order.detail', $id)->with('success', 'Order Cancelled');
    }
}
