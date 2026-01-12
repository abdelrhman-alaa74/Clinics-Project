<?php

namespace App\Http\Services\Payment;

use App\Models\Transaction;

class TransactionService
{
    public function createTransaction(array $data){
        Transaction::create([
            'user_id'     => $data['user_id'],
            'model_id'    => $data['model_id'],
            'model_type'  => $data['model_type'],
            'amount'      => $data['amount'] ?? 0,
            'status'      => $data['status'] ?? 'pending',
            'coupon'      => $data['coupon'] ?? null,
            'gateway_uuid'=> $data['gateway_uuid'] ?? null,
            'model_json'  => $data['model_json'] ?? null,
        ]);
    }

    public function updateTransaction(Transaction $transaction, array $data){
        $transaction->update($data);
    }
}