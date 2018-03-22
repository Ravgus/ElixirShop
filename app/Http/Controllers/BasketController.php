<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class BasketController extends Controller
{
    //
    public function addProduct(Request $request)
    {
        $json = [
            'id' => $request->id,
            'name' => $request->title,
            'alias' => $request->alias,
            'count' => $request->count,
            ];

        $json = json_encode($json);
        session(['product_'.$request->id => $json]);

        return $json;
    }

    public function showBasket(Request $request)
    {
        $categories = Category::all();

        $data = $request->session()->all();
        $products = [];
        $price_result = 0;

        foreach ($data as $key=>$value) {
            if(stripos($key, 'product_') !== false) {
                $data[$key] = json_decode($value);
                $product = Product::find($data[$key]->id);
                $price_result += $product->price*$data[$key]->count;
                $product->count = $data[$key]->count;
                $products[] = $product;
            } /*else {
                unset($data[$key]);
            }*/
        }

        //dd($products);
        //dd($price_result);

        return view('basket', [
            'categories' => $categories,
            'products'   => $products,
            'price_result' => $price_result,
        ]);
    }

    public function showBilling()
    {

    }

}
