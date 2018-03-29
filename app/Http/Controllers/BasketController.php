<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Category;
use App\Order;

class BasketController extends Controller
{
    //
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'count' => 'required|integer|min:1',
        ]);

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
        if($request->has('count')) {
            $this->validate($request, [
                'count' => 'required|integer|min:1',
            ]);
        }

        $categories = Category::all();

        $data = $request->session()->all();
        $products = [];
        $price_result = 0;

        foreach ($data as $key=>$value) {
            if(stripos($key, 'product_') !== false) {
                $data[$key] = json_decode($value);
                $product = Product::find($data[$key]->id);
                if($key == 'product_'.$request->id) {
                    $data[$key]->count = $request->count;

                    $json = session('product_'.$request->id);
                    $json = json_decode($json);
                    $json->{'count'} = $request->count;
                    session(['product_'.$request->id => json_encode($json)]);

                }
                $price_result += $product->price*$data[$key]->count;
                $product->count = $data[$key]->count;
                $products[] = $product;
            }
        }

        return view('basket', [
            'categories' => $categories,
            'products'   => $products,
            'price_result' => $price_result,
        ]);
    }

    public function showBilling(Request $request)
    {
        $categories = Category::all();

        return view('billing', [
            'categories' => $categories,
            'price' => $request->price,
        ]);
    }

    public function makeBilling(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string',
            'secondname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'address' => 'required|string',
        ]);

        $data = $request->session()->all();

        foreach ($data as $key=>$value) {
            if(stripos($key, 'product_') !== false) {

            } else {
                unset($data[$key]);
            }
        }

        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }
        $order->email = $request->email;
        $order->order = $data;
        $order->save();

        $request->session()->flush();

        $request->session()->flash('message', 'Спасибо за покупку! Наш менеджер в ближайшее время свяжется с вами');

        return 'success';
    }

}
