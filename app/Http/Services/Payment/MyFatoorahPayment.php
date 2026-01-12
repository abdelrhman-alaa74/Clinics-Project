<?php

namespace App\Http\Services\Payment;

use APP\Interfaces\PaymentGateway;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MyFatoorahPayment implements PaymentGateway{
    private $base ;
    private $token ;

    private $transactionService;

    public function __construct
    (
        TransactionService $transactionService,
    )
    {
        $this->base = env('MYFATOORAH_BASE_URL'); 
        $this->token = env('MYFATOORAH_TOKEN');
        $this->transactionService = $transactionService;
    }


    public function sendPayment(Package $package){

        // uuid
        //getway_uuid
        //user_id
        //model_json
        //model_type
        //model_id
        //status ->pending , success , failed
        //coupon
        //amount
        //create transaction with pending status
        //error message


        $transactionUUID = Str::uuid()->toString();
        // dd($transactionUUID);
        $this->transactionService->createTransaction([
            'gateway_uuid' => $transactionUUID,
            'user_id' => Auth::id(),
            'model_id' => $package->id,
            'model_type' => Package::class,
            'amount' => $package->progress_salary,
            'status' => 'pending',
            'model_json' => $package->toJson(),
        ]);

        // $transaction = Transaction::where('gateway_uuid', $transactionUUID)->first()->gateway_uuid;
        $response = Http::withToken($this->token)->post($this->base.'/v2/SendPayment', [
            'NotificationOption'=> 'LNK',
            'InvoiceValue' => $package->progress_salary,
            'CustomerName'=> 'Test User',
            'CallbackUrl'=> route('payment.callback' , $transactionUUID),
            'ErrorUrl'=> route('payment.error'),
            'DisplayCurrencyIso'=> 'EGP',
        ]);
        // dd($response['Data']);

        // dd($transaction);
        if($response->successful()){
            $data = $response['Data'];
            return redirect($data['InvoiceURL']);
        }
        return response()->json(['error' => 'Payment Failed', 400]);
    }

    public function handleCallback(Request $request , $transactionUUID){


        //update   transaction

        $paymentId = $request->query('paymentId');


        if(!$paymentId){
            return to_route('doctor.index')->with('message', 'Payment cancelled or invalid session.');
        }

        $transaction = Transaction::where('gateway_uuid', $transactionUUID)->first();

        if (!$transaction) {
        return to_route('doctor.index')->with('message', 'The Transaction not Found');
        }


        $response = Http::withToken($this->token)->post($this->base . '/v2/GetPaymentStatus', [
            'Key' => $paymentId,
            'KeyType' => 'PaymentId'
        ]);
        if($response->successful()){
            $data = $response['Data'];
            //user package table -> transactionid,userid,package,id,package start , end ,status 
            if($data['InvoiceStatus'] == 'Paid'){
                // if($data['InvoiceValue'] == $package->progress_salary){
                    $this->transactionService->updateTransaction(
                        $transaction,
                        [
                            'status' => 'paid',
                        ]
                    );
                    return to_route('doctor.index')->with('message','Paid Successfully on Invoice Id =' . $data['InvoiceId']);
                    // }
                }
                $this->transactionService->updateTransaction(
                    $transaction,
                    [
                        'status' => 'cancelled',
                    ]
                );

            return to_route('doctor.index')->with('message','Paid Failed');

        }

    }

    public function handleError() {
        return to_route('doctor.index')->with('message', 'You have cancelled the payment process.');
    }

}