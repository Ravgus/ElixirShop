<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\User;
use App\Order;
use App\Product;
use App\Wish;

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

    public function wishList(Request $request)
    {
        if ($request->isMethod('get')) {

            $empty = '';
            $wishes = Wish::where('user_id', Auth::id())->with('product')->get();//paginate(5)

            if($wishes->isEmpty())
                $empty = 'Ваш список пуст';

            return view('cabinet.wishlist', [
                'wishes' => $wishes,
                'empty'  => $empty,
            ]);

        } elseif ($request->isMethod('post')) {

            if(Wish::where('product_id', $request->id)->first() != null) {
                return 'already';
            }

            $wish = new Wish();
            $wish->product_id = $request->id;
            $wish->user_id = Auth::id();
            $wish->save();

            return 'success';

        }

        return 'Unknown action';
    }

    public function showHistory()
    {
        $empty = '';
        $orders = Order::where('user_id', Auth::id())->get();
        $histories = $this->orderDecode($orders);

        if($orders->isEmpty())
            $empty = 'Ваш список пуст';

        return view('cabinet.history', [
            'histories' => $histories,
            'empty'  => $empty,
        ]);
    }

    public function changeInformation(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('cabinet.change_user_info', ['user' => Auth::user()]);
        } elseif ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'phone' => 'required||string|max:32',
                'address' => 'required|string|max:255',
            ]);

            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
        }

        return redirect()->route('home');
    }

    public function changeEmail(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('cabinet.change_user_email', ['user' => Auth::user()]);
        } elseif ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            $user = User::find(Auth::id());
            $user->email = $request->email;
            $user->save();
        }

        return redirect()->route('home');
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('cabinet.change_user_password');
        } elseif ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required|string|min:6',
            ]);

            $user = User::find(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('home');
    }

    public function orderDecode($orders)
    {
        $histories = [];
        $price = 0;

        /*foreach ($orders as $order) {
            foreach ($order->order as $k => $v) {
                $histories[$order->id][$k] = json_decode($v);
            }
        }*/

        foreach ($orders as $order) {
            foreach ($order->order as $k => $v) {
                $temp = json_decode($v);
                $histories[$order->id][$k] = [Product::find($temp->id), $temp->count];
                $price += Product::find($temp->id)->price * $temp->count;
            }
            $histories[$order->id]['time'] = $order->created_at->toDateTimeString();
            $histories[$order->id]['price'] = $price;
            $price = 0;
        }

        return $histories;
    }
}
