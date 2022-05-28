<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Laravel\Scout\Searchable;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, SluggableScopeHelpers,
    Searchable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function searchableAs()
    {
        return 'title';
    }

    protected $fillable=[
        'title','summary','user_id','author_id',
        'content','status','index_status','tags','image_credit'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('imageCard')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('imageCard-icon')
                    ->width(380);
                $this->addMediaConversion('blog-thumb')
                    ->width(650);
            });
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }


}
