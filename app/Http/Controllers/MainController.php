<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class MainController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('main_page', [
            'products'   => $products,
            'categories' => $categories,
            'title'      => 'Главная'
        ]);
    }
}
