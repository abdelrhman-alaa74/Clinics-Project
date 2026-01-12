<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'icon',
        'service_title',
        'service_description',
    ];
}
