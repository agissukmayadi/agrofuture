<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function product(Request $request)
    {
        $categories = Category::all();
        $query = Product::with([
            'images' => function ($query) {
                $query->where('is_thumbnail', true);
            }
        ]);

        // Filter berdasarkan nama produk
        if ($request->has('product') && !empty($request->product)) {
            $query->where('name', 'like', '%' . $request->product . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('category', function (Builder $builder) use ($request) {
                $builder->whereIn('slug', $request->category);
            });
        }

        $products = $query->orderBy('stock', 'desc')->paginate(8)->withQueryString();

        return view('product', compact('categories', 'products'));
    }

    public function productDetail()
    {
        return view('product_detail');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}