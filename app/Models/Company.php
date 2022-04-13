<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use HasFactory,Sluggable,SluggableScopeHelpers, InteractsWithMedia;
    public $fillable=['name','location_id','slug'];
    /* Return the sluggable configuration array for this model.
*
* @return array
*/
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('logo-icon')
            ->width(100)
            ->height(100);

    }
}


