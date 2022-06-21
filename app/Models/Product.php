<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable,SluggableScopeHelpers;

    protected $fillable=['name','price','sale_price','sku','status',
    'category_id','description'
];
 public function category(){
    return $this->belongsTo(category::class);
 }
 public function sluggable(): array
 {
     return [
         'slug' => [
             'source' => 'name'
         ]
     ];
 }
 public function registerMediaCollections(): void
 {
     $this
         ->addMediaCollection('photo')
         ->registerMediaConversions(function (Media $media) {

             $this->addMediaConversion('photo-thumb')
                 ->width(650);
         });
 }
}
