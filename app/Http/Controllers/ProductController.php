<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    //
    public function index($alias)
    {
        $categories = Category::all();
        $category_count = [];

        foreach (Category::all() as $category)
        {
            $category_count[] = $category->products->count();
        }

        $product = Product::where('alias', $alias)->firstOrFail();

        return view('product', [
            'product'    => $product,
            'count'      => $category_count,
            'categories' => $categories
        ]);
    }
}
