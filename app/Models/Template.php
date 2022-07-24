<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Template extends Model implements HasMedia
{
    use HasFactory, Sluggable, SluggableScopeHelpers, InteractsWithMedia;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable=[
        'name','status','description','folder'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('template')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('template-icon')
                    ->width(400);

            });
    }
}
