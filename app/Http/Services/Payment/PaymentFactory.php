<?php

namespace App\Http\Services\Payment;

class PaymentFactory
{
public static function make(string $driver = 'myfatoorah'): PaymentService
{
    return match ($driver) {
        'myfatoorah' => new PaymentService(new MyFatoorahPayment(new TransactionService())),
        // 'paymob' => new PaymentService(new PaymobPayment()),
        default => throw new \Exception('Payment driver not supported'),
    };
}

}