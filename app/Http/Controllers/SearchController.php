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

        //dd(empty($empty));

        /*//1
        $query = $request->query_body;

        $urls = [];
        $descriptions = [];
        $empty = '';

        $categories = Category::all();

        $query_cat = Category::where('name', 'LIKE', '%'.$query.'%')->get();
        $query_prod = Product::where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('small_description', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')->get();


        if(!$query_cat->isEmpty()) {
            foreach ($query_cat as $cat) {
                $urls[$cat->name] = url('/categories/'.$cat->alias);
                foreach ($cat->products as $prod) {
                    $urls[$prod->name] = url('/categories/'.$prod->category->alias.'/'.$prod->alias);
                    $descriptions[$prod->name] = $prod->small_description;
                }
            }
        }

        if(!$query_prod->isEmpty()) {
            foreach ($query_prod as $prod) {
                $urls[$prod->name] = url('/categories/'.$prod->category->alias.'/'.$prod->alias);
                $descriptions[$prod->name] = $prod->small_description;
                $urls[$prod->category->name] = url('/categories/'.$prod->category->alias);
            }
        }

        if($query_cat->isEmpty() && $query_prod->isEmpty()) {
            $empty = 'Ничего не найдено';
        }
        
        return view('search', [
            'empty' => $empty,
            'urls' => $urls,
            'descriptions' => $descriptions,
            'categories' => $categories
        ]);*/

        return view('search', [
            'empty' => $empty,
            'categories' => $categories,
            'results' => $results,
        ]);

    }
}
