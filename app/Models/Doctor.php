<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'doctor_name',
        'doctor_phone',
        // 'doctor_avatar',
        'specialty',
        'description',
        'facebook',
        'twitter',
        'linkedin',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
        ->singleFile();
    }

    static public function specialty()
    {
        return [
            'general' => 'General Medicine',
            'dental' => 'Dentistry',
            'cardiology' => 'Cardiology',
            'dermatology' => 'Dermatology',
            'ent' => 'ENT (Ear, Nose & Throat)',
            'orthopedics' => 'Orthopedics',
            'pediatrics' => 'Pediatrics',
            'gynecology' => 'Gynecology',
            'ophthalmology' => 'Ophthalmology',
            'neurology' => 'Neurology',
            'urology' => 'Urology',
            'radiology' => 'Radiology',
        ];
    }

public function getImageAttribute(): string
{
    return $this->getFirstMediaUrl('avatars') 
        ?: asset('assets/img/default-doctor.jpg');
}
}