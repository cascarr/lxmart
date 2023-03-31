<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack; // Paystack package
use Auth;
use App\CustomerOrder;
use App\Payment;
use App\User;

class PaymentController extends Controller
{
    //
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
    */
    public function redirectToGateway(Request $request) {
        try {
            //code...
            $data = array();

            return Paystack::getAuthorizationUrl()->redirectNow();

        } catch (\Exception $e) {
            //throw $th;
            return Redirect::back()->withMessage([
                'msg'=>'The paystack token has expired. Please refresh the page and try again.',
                'type'=>'error'
            ]);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
    */
    public function handleGatewayCallback() {

        //Getting authenticated user
        $id = Auth::id();

        // Getting the specific customer and his details
        $customerDetails = CustomerOrder::where('customer_id', $id)->with('orderedProducts')->first();

        foreach ($customerDetails as $customerDetail) {
            foreach ($customerDetail->$orderedProducts as $orderedProduct) {
                $customer_id = $customerDetail->customer_id;
                $customerOrder_id = $customerDetail->id;
                $customer_email = $customerDetail->user->email;
                $customerBuyProduct_id = $orderedProduct->product_id
            }
        }


        // Processing the Customer's transaction
        $paymentDetails = Paystack::getPaymentData();

        // Getting the value via an array method
        $inv_id = $paymentDetails['data']['metadata']['invoiceId']; // Getting the Invoiced passed from the form
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; // Getting the Amount
        $number = $randnum = rand(1111111111,9999999999); // Specific to the application
        $number = 'year'. $number;

        // Checking to Ensure the transaction was successful
        if ($status == "success") {

            // Storing the payment in the database
            Payment::create([
                'customer_id' => $customer_id,
                'invoice_id' => $inv_id,
                'amount' => $amount,
                'status' => 1
            ]);

            CustomerOrder::where('customer_id', $id)
                         ->update([
                            'payment_reg_no' => $number,
                            'status' => 1, // payment acceptance number
                         ]);

            return view('frontend.payment.appreciation');

        }

        // payment gateway ends here
    }

}
