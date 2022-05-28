<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers, Searchable;
    protected $fillable=['status_id','title','industry_id',
        'profession_id','description','link','deadline','company_id',
        'location_id','experience_id','user_id','tags', 'type_id','range_id','index_status'];
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
    public function searchableAs()
    {
        return 'title';
    }
    public function profession(){
        return $this->belongsTo(Profession::class);
    }

    public function blocks(){
        return $this->hasMany(Block::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);

    }
    public function range(){
        return $this->belongsTo(Range::class);

    }

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function experience(){
        return $this->belongsTo(Experience::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public  function scopeActive($query){
        return $query->where('status_id',2);
    }


}
