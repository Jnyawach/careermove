<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Profession extends Model
{
    use HasFactory,Sluggable,SluggableScopeHelpers;

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
    protected $fillable=[
        'name','status'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function subscriber(){
        return $this->belongsToMany(Subscriber::class);
    }
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
