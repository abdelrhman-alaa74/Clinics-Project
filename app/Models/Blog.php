<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'writer',
        'blog_title',
        'blog_description',
        'views',
        'user_id',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blogImage')
        ->singleFile();
    }

    public function getImageAttribute(){
        return $this->getFirstMediaUrl('blogImage');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
