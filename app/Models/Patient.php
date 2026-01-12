<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Patient extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'patient_name',
        'patient_email',
        'patient_phone',
        // 'patient_thumbnail',
        'patient_age',
        'patient_diseases',
    ];
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnails')
        ->singleFile();
    }
    protected $casts = [
        'patient_diseases' => 'array',
    ];
}
