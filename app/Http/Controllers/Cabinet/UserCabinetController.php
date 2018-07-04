<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\User;
use App\Order;
use App\Product;
use App\Wish;
use Illuminate\Validation\Rule;

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
        $wishes = Wish::where('product_id', $request->id)->where('user_id', Auth::id())->get();

        if ($wishes->isNotEmpty()) {
            foreach ($wishes as $wish)
                $wish->delete();

            return 'deleted';
        } else {
            $wish = new Wish();
            $wish->product_id = $request->id;
            $wish->user_id = Auth::id();
            $wish->save();

            return 'added';
        }
    }

    public function showWishList()
    {
        $empty = '';
        $wishes = Wish::where('user_id', Auth::id())->with('product')->get()/*paginate(5)*/
        ;

        if ($wishes->isEmpty())
            $empty = '';

        return view('cabinet.wishlist', [
            'wishes' => $wishes,
            'empty' => $empty,
        ]);
    }

    public function showHistory()
    {
        $empty = '';
        $orders = Order::where('user_id', Auth::id())->get();
        $histories = $this->orderDecode($orders);

        /*if ($orders->isEmpty())
            $empty = '';*/
//dd($this->orderDecode($orders));
        $this->orderDecode($orders);

        return view('cabinet.history', [
            'histories' => $histories,
            'empty' => $empty,
        ]);
    }

    public function changeInformation(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('cabinet.change_user_info', ['user' => Auth::user()]);
        } elseif ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'phone' => array(
                    'required',
                    'regex:/^\+380[0-9]{9}$/'
                ),
                'address' => 'required|string|max:255',
            ]);

            $user = Auth::user();
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
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id()
            ]);

            $user = Auth::user();
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

            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('home');
    }

    public function orderDecode($orders)
    {
        /*$histories = [];
        $price = 0;

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

        return $histories;*/

        $histories = [];

        foreach ($orders as $key1 => $order) {
            $histories[$key1]['time'] = $order->updated_at;
            foreach ($order->order as $key2 => $item) {
                if ($key2 == 'total') {
                    $histories[$key1]['total_price'] = $item;
                } elseif ($key2 == 'payment_type') {
                } else {
                    $prod = Product::find($item['id']);
                    $histories[$key1]['data'][] = [
                        'name' => $prod->name,
                        'category' => $prod->category->alias,
                        'alias' => $prod->alias,
                        'count' => $item['count']
                    ];
                }
            }
        }

        //dd($histories);

        return $histories;
    }
}
