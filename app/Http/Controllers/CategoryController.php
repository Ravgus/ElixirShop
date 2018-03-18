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
            $current_category = collect(['name' => 'Все', 'alias' => $alias]);
        } else {
            $products = Category::where('alias', $alias)->firstOrFail();
            $title_category = $products->name;
            $current_category = collect(['name' => $title_category, 'alias' => $alias]);
            $products = $products->products()->paginate(4);
        }

        return view('categories', [
            'title_category' => $title_category,
            'count'      => $category_count,
            'categories' => $categories,
            'products'   => $products,
            'current_category' => $current_category,
        ]);
    }
}
