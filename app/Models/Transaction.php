<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    protected $fillable = [
        // 'uuid',
        'gateway_uuid',
        'user_id',
        'model_id',
        'model_type',
        'model_json',
        'status',
        'coupon',
        'amount',
    ];

    public function model(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'model_json' => 'json'
    ];


}
