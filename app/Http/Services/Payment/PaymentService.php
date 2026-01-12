<?php

namespace App\Http\Services\Payment;

use APP\Interfaces\PaymentGateway;
use App\Models\Package;
use Illuminate\Http\Request;

class PaymentService
{
    public function __construct(
        protected PaymentGateway $gateway,
    )
    {}

    public function pay(Package $package){
        return $this->gateway->sendPayment($package);
    }
    public function callback(Request $request , $transaction){
        return $this->gateway->handleCallback($request, $transaction);
    }

    public function getError(){
        return $this->gateway->handleError();
    }
}