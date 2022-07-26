<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable=['user_id','social_id','link'];
    public  function user(){
        return $this->belongsTo(User::class);
    }
    public  function social(){
        return $this->belongsTo(Social::class);
    }
}
