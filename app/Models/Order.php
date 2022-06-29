<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable=[
        'name','email','cellphone','user_id','product_id','progress_id',
        'comment','paid', 'order_number','trans_id'
    ];

    public function progress(){
        return $this->belongsTo(Progress::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function discount(){
        return $this->hasMany(Discount::class);
    }

    public function payment(){
        return $this->hasOne(MpesaStkPush::class);
    }
}
