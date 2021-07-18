<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Omnipay\Omnipay;
use App\Payment;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {
              Stripe::setApiKey('sk_test_51HJFojKkeybiKlO8OSXKDwHUFsr4gJGgPwYo3fvdtFb747EkzBzLdXQf2eWCvvOrn2wA5mYZiaGfvamTK7HDjAAF00lqnvvx6j');
                   try{
                       Charge::create(array(
                           "amount" => 100,
                           "currency"=> "usd",
                           "source"=> $request->input('stripeToken'),
                           "description"=> "test charge"
                       ));
                   }catch(\Exception $e){
                       return redirect()->route('payment');
                   }
            }
}
