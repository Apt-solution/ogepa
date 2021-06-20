<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Services\UserService;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function initialize()
    {

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        $email = request()->email;
        if (!$email) {
            $email = 'no-address@ogwama.org.ng';
        }

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => /*request()->amount */ 900,
            'email' => $email,
            'tx_ref' => request()->ref,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => 'Ogwama Payment',
                "description" => "payment to make"
            ]
        ];


        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);

            $data['paystack_ref'] = $transactionID;
            $data['ref'] = $data['data']['tx_ref'];
            $data['response'] = $data;

            $this->userService->updatePayment($data);
            // Session::flash('success', 'payment successful');
            return redirect('user_profile')->with('success', 'payment successful');

            // dd($data);
        } elseif ($status ==  'cancelled') {

            return redirect('user_profile')->with('error', 'payment failed');

        } else {
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
