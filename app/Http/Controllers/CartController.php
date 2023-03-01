<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
// use App\Http\Controllers\CartController

class CartController extends Controller
{
    //
    public function getCart() {
        return view('frontend.productview.cart');
    }

    /**
     * Method for Cart update functionality
    */
    public function updateCart(Request $request) {
        //
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully!');
        }

    }

    /**
     * Method for removeFromCart functionality
    */
    public function removeItem(Request $request) {

        if ($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product successfully removed!');
        }

    }

    /**
     * Method for clearCart functionality
    */
    public function clearCart() {

        session()->flush();
        session()->forget('cart');

        return redirect('/');

    }

}
