<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;
    protected $fillable=['status_id','title','industry_id',
        'profession_id','description','link','deadline','company_id',
        'location_id','experience_id','user_id','tags'];
    /* Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function profession(){
        return $this->belongsTo(Profession::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);

    }

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }


}
