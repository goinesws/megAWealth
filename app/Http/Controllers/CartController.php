<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->paginate(4);
        return view('member.cart', compact('carts'));
    }

    public function addCart(Request $request)
    {
        if(Cart::where('estate_id', $request->id)->exists()) {
            return redirect()->back()->with('message', 'This estate is already booked');
        }

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->estate_id = $request->id;
        Estate::where('estate_id', $request->id)->update(['status' => 'Cart']);
        $cart->save();
        return redirect()->back()->with('message', 'Estate added to cart');
    }

    public function cancelCart($id)
    {
        $cart = Cart::where([
        ['estate_id', '=', $id],
        ['user_id', '=', Auth::id()]
        ])->delete();
        Estate::where('estate_id', $id)->update(['status' => 'Open']);
        return redirect()->back();
    }

    public function cartCheckout()
    {
        $carts = Cart::where('user_id', auth()->user()->user_id)->get();
        foreach ($carts as $cart) {
            Estate::where('estate_id', $cart->estate_id)->update([
                'status' => 'Transaction Complete'
            ]);
        }
        Cart::where('user_id', Auth::id())->delete();
        return redirect('/home')->with('message', 'Checkout Successful');
    }
}
