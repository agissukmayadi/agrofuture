<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
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
        return response()->view('admin.categories', compact(['user', 'categories']));
    }

    public function categories_store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function categories_update(CategoryRequest $categoryRequest, string $id)
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

    public function categories_destroy(string $id)
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
        $productsQuery = Product::with(['category']);

        if ($request->has('name') && !empty($request->name)) {
            $productsQuery->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('category_id') && !empty($request->category_id)) {
            $productsQuery->whereHas('category', function (Builder $builder) use ($request) {
                $builder->whereIn('category_id', $request->category_id);
            });
        }

        $products = $productsQuery->paginate(10)->withQueryString();
        return response()->view('admin.products', compact(['user', 'categories', 'products']));
    }

    public function products_create(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        return response()->view('admin.products_create', compact(['user', 'categories']));
    }

    public function products_store(ProductRequest $request)
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

    public function products_edit(Request $request, string $id)
    {
        $user = Auth::user();
        $categories = Category::all();
        $product = Product::with(['category', 'images'])->find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        return response()->view('admin.products_edit', compact(['user', 'categories', 'product']));
    }

    public function products_update(ProductRequest $request, string $id)
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

    public function products_images_delete(string $id)
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

    public function products_destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found');
        }
        // foreach ($product->images as $image) {
        //     if (Storage::disk('public')->exists('img/products/' . $image->name)) {
        //         Storage::disk('public')->delete('img/products/' . $image->name);
        //     }
        // }
        // $product->images()->delete();
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
        return response()->view('admin.users', compact(['users', 'user']));
    }

    public function users_store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function users_destroy(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    public function users_update(UserRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }
        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
}