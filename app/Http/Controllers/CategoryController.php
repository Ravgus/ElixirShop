<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    //
    public function index($alias)
    {
        $category_count = [];
        $categories = Category::all();

        foreach ($categories as $category)
        {
            $category_count[] = $category->products->count();
        }

        if($alias === 'all') {
            $products = Product::paginate(4);
            $title_category = 'Все товары';
        } else {
            $products = Category::where('alias', $alias)->firstOrFail();
            $title_category = $products->name;
            $products = $products->products()->paginate(4);
        }

        return view('categories', [
            'title_category' => $title_category,
            'count'      => $category_count,
            'categories' => $categories,
            'products'   => $products,
        ]);
    }
}
