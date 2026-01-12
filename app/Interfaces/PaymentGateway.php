<?php

namespace APP\Interfaces;

use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;



interface PaymentGateway{
    public function sendPayment(Package $package);
    public function handleCallback(Request $request , $transaction);
    public function handleError();
}