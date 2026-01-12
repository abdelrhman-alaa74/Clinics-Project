<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'group',
        'key',
        'value'
    ];

    // public static function group(){
    //     return [
    //         'admin-information' => 'Admin Information',
    //         'social-media' => 'Social Media',
    //         'seo' => 'SEO',
    //         'hero' => 'Hero'
    //     ];
    // }

}
