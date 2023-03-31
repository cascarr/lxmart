<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CustomerOrder;
use App\Models\OrderedProduct;

class OrderController extends Controller
{
    //
    public function gotoOrder(Request $request) {

        return redirect('checkout/form');
    }

    //
    public function orderForm(Request $request) {

        $cartItems = Cart::where('user_id', Auth::id())->get();
        // dd($cartItems);

        return view('frontend.productview.checkout', [
            'cartItems' => $cartItems,
        ]);

    }

    /**
     * Place Order Form
     */
    public function placeOrder(Request $request) {
        //
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {

                # Storing the Session data to Cart for the newly signed in user...
                $newCartItem = new Cart();
                $newCartItem->quantity = $details['quantity'];
                $newCartItem->prod_id = $id;
                $newCartItem->user_id = Auth::id();
                $newCartItem->save();
            }
        }


        # Updating the User's Record on the User table
        if (Auth()->user()->address == NULL) {
            Auth()->user()->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'city_region' => $request->city,
                'cc_number' => $request->cc_no,
            ]);
        }



        # Start recording the Customer's Order
        $customerOrderRec = new CustomerOrder();
        $customerOrderRec->cc_name = $request->cname;
        $customerOrderRec->cc_cvv = $request->c_cvv;
        $customerOrderRec->cc_expirydate = $request->cexpirydate;
        $customerOrderRec->tracking_no = 'lxmart'.rand(1111, 9999);
        $customerOrderRec->customer_id = Auth::id();
        $customerOrderRec->save();



        # Storing the Ordered Product Record in the OrderedProduct table
        $itemsInCart = Cart::where('user_id', Auth::id())->get();
        foreach ($itemsInCart as $item) {

            # Calling the OrderedProduct model
            $orderedProdRec = new OrderedProduct();
            $orderedProdRec->selling_price = $item->product->price;
            $orderedProdRec->quantity = $item->quantity;
            $orderedProdRec->total_amount = $item->product->price * $item->quantity;
            $orderedProdRec->product_id = $item->product->id;
            $orderedProdRec->customer_order_id = $customerOrderRec->id;
            $orderedProdRec->save();
        }

        # Destroy/Empty the Customer's Cart after Order
        Cart::destroy($itemsInCart);
        session()->flush();
        session()->forget('cart');

        return redirect('checkout/confirm')->with('success', 'Your order has been recorded');


    }

    /**
     * Confirm Order form before proceed to payment
     */
    public function confirmOrder() {

        $cusCardInfo = CustomerOrder::where('customer_id', Auth::id())->with('orderedProducts')->get();

        return view('frontend.productview.confirm-order', [
            // 'cardInfos' => $cardInfos,
            'cusCardInfo' => $cusCardInfo,
        ]);
    }

}
