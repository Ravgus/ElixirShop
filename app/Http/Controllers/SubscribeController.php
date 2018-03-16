<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscribeController extends Controller
{
    //
    public function index(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers|max:255',
        ]);

        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->save();

        return redirect()->route('main')->with('message', 'Спасибо за подписку!');
    }
}
