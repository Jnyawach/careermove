<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','institution','degree','education_level',
        'grade','start','end','current','education_summary'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
