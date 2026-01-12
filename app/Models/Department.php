<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_title',
        'department_description'
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}
