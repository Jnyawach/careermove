<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimony extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable=[
        'first_name','last_name','title','content','status','rating'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('profile-icon')
            ->width(100);

    }
}
