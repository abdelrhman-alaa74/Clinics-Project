<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'progress_title',
        'progress_salary',
        'progress_description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('packageImage')
        ->singleFile();
    }
    protected $casts = [
        'progress_description' => 'array',
    ];

    public function getImageAttribute(): string
{
        return $this->getFirstMediaUrl('packageImage')
        ?: asset('images/default-package.png');
}
}
