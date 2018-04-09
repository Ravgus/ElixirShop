<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;

use Route;

class ArticlesControllers extends Controller
{
    //
    public function index()
    {
        $uri = Route::current()->getName();
        return view('articles.' . $uri, [
            'categories' => Category::all(),
            'article' => Article::where('alias', $uri)->firstOrFail()
        ]);
    }

}
