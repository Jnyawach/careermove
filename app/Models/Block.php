<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable=['user_id','job-id','reason'];

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
