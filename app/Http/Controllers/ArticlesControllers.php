<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesControllers extends Controller
{
    //
    public function about(Request $request)
    {
        dump($request->cookie());
        dd($request->session()->all());
    }

    public function contacts()
    {

    }

    public function partnership()
    {

    }

    public function delivery()
    {

    }

    public function guarantees()
    {

    }

    public function career()
    {

    }

    public function questionsAnswers()
    {

    }

    public function connection()
    {

    }

    public function support()
    {

    }

    public function returnProducts()
    {

    }

    public function shares()
    {

    }
}
