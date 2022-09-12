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
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements HasMedia,Feedable
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
    public function toFeedItem(): FeedItem
    {

        return FeedItem::create()
            ->id($this->slug)
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link(route('blog.show',$this->slug))
            ->authorName($this->author->first_name.' '.$this->author->last_name);
    }
    // app/NewsItem.php

    public static function getFeedItems()
    {
        return Post::all();
    }
    public function searchableAs()
    {
        return 'title';
    }

    protected $fillable=[
        'title','summary','user_id','author_id',
        'content','status','index_status','tags','image_credit','readers',
        'like','dislike'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('imageCard')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('imageCard-icon')
                    ->width(480)
                    ->height(270);
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

    public function comments(){
        return $this->belongsTo(Comment::class);
    }


}
