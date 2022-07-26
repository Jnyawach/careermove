<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected  $fillable=['name','icon'];

    public  function links(){
        return $this->hasMany(Link::class);
    }
}
