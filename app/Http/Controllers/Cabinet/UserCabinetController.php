<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Wish;
use App\Product;
use Auth;

class UserCabinetController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cabinet.main');
    }

    public function addToWishList(Request $request)
    {
        if(Wish::where('product_id', $request->id)->first() != null) {
            return 'already';
        }

        $wish = new Wish();
        $wish->product_id = $request->id;
        $wish->user_id = Auth::id();
        $wish->save();

        return 'success';
    }

    public function showWishList()
    {
        $empty = '';
        $wishes = Wish::where('user_id', Auth::id())->with('product')->paginate(5);

        if($wishes->isEmpty())
            $empty = 'Ваш список пуст';

        //dd($empty);

        return view('cabinet.wishlist', [
            'wishes' => $wishes,
            'empty'  => $empty,
        ]);
    }
}
