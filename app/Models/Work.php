<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','organization','title','size','current',
        'achievement','profession_id','industry_id','start','end','visibility'
    ];
}
