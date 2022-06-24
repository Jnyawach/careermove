<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Discount extends Model
{
    use HasFactory;

    protected $fillable=[
        'code','order_id','status','expiry','amount'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
