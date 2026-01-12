<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\Payment\MyFatoorahPayment;
use App\Http\Services\Payment\PaymentFactory;
use App\Http\Services\Payment\PaymentService;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

    public function __construct(
        protected PaymentFactory $paymentFactory,
    )
    {}

    public function sendPayment(Package $package){
        $payment = $this->paymentFactory->make('myfatoorah');
        return $payment->pay($package);
    }
    public function callback(Request $request , $transaction){
        $payment = $this->paymentFactory->make('myfatoorah');
        return $payment->callback($request , $transaction);
    }
    
    public function handleError(){
        $payment = $this->paymentFactory->make('myfatoorah');
        return $payment->getError();
    }

}
