<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        //2
        if($request->has('query_body'))
            $query = $request->query_body;
        else
            $query = '';

        $empty = '';
        $results = null;

        $categories = Category::all();

        if(!empty($query)) {
            $query_cat = Category::search($query)->get();
            $query_prod = Product::search($query)->get();

            $unite = $query_cat->merge($query_prod);

            if($unite->isEmpty()) {
                $empty = 'Ничего не найдено';
            } else {
                $results = new LengthAwarePaginator($unite->all(), 5, 20);
            }

        } elseif(empty($query)) {
            $empty = 'Ничего не найдено';
        }

        return view('search', [
            'empty' => $empty,
            'categories' => $categories,
            'results' => $results,
        ]);

    }
}
