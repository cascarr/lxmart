<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Method for viewCart functionality
    */
    public function getCart() {

        // session()->flush();
        // session()->forget('cart');

        $cartItems = Cart::where('user_id', Auth::id())->get();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $cartSecurity = Auth::check() && Cart::where('user_id', Auth::id());

        $checklogin = Auth::check();


        return view('frontend.productview.cart', [
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
            'cartSecurity' => $cartSecurity,
            'checklogin' => $checklogin,
        ]);

    }

    /**
     * Method for addToCart functionality
    */
    public function addToCart($id) {

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            session()->flash('success', 'You Added more to Cart Successfully!');

            return redirect()->route('checkout.cart');

        } else if (Auth::check() && Cart::where('prod_id', $product->id)->where('user_id', Auth::id())->exists()) {


            session()->flash('success', 'This Product Already Exists in the database!');

            return redirect()->route('checkout.cart');

        } else if (Auth::check()) {

            //
            $newCartItm = new Cart();
            $newCartItm->quantity = 1;
            $newCartItm->prod_id = $product->id;
            $newCartItm->user_id = Auth::id();
            $newCartItm->save();

            return redirect()->route('checkout.cart');

        } else {
            $cart[$id] = [
                "product_name" => $product->name,
                "product_image" => $product->product_img,
                "price" => $product->price,
                "quantity" => 1
            ];

            session()->put('cart', $cart);
            session()->flash('success', 'Product is Added to Cart Successfully!');

            return redirect()->route('checkout.cart');
        }

    }

    /**
     * Method for Cart update functionality
    */
    public function updateCart(Request $request) {

        // check if user is Auth
        if (Auth::check()) {

            $cartRow = Cart::where('id', $request->id)->first();

            if ($cartRow) {

                $cartRow->update([
                    'quantity' => $request->quantity,
                    'user_id' => Auth::id(),
                ]);

                session()->flash('success', 'DB Cart quantity updated to '. $request->quantity .' successfully!');
            }

        } elseif ($request->id && $request->quantity) {

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

        if (Auth::check()) {
            //
            $delCartItem = Cart::where('id', $request->id)->where('user_id', Auth::id())->first();
            $delCartItem->delete();

            session()->flash('success', 'Product successfully removed from Cart DB!');

        } else {

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

        if (Auth::check()) {

            $delAllCtItem = Cart::where('user_id', Auth::id());
            $delAllCtItem->delete();

            return redirect('/');

        } else {

            session()->flush();
            session()->forget('cart');

            return redirect('/');

        }

    }

}
