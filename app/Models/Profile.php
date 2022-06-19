<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'lastName','title','experience_id','user_id','birthday','website',
        'linkedin','gender','cellphone'
    ];

    public function users(){
        return$this->belongsTo(User::class);
    }
    public function experience(){
        return $this->belongsTo(Experience::class);
    }
}
