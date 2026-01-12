<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Review extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        // 'patient_id',
        'RName',
        'content',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnails')
        ->singleFile()
        ;
    }
    
    
}
