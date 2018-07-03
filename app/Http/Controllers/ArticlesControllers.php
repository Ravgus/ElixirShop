<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Route;

class ArticlesControllers extends Controller
{
    public function index()
    {
        $uri = Route::current()->getName();
        return view('articles.article', [
            'categories' => Category::all(),
            'article' => Article::where('alias', $uri)->firstOrFail()
        ]);
    }
}
