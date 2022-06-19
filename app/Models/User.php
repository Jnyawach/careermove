<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function profession(){
        return $this->belongsToMany(Profession::class);
    }
    public function employer(){
        return $this->hasOne(Employer::class);
    }
    public function companies(){
        return $this->belongsToMany(Company::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public  function summary(){
        return $this->hasOne(Summary::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('profile')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('profile-icon')
                    ->width(250)
                    ->height(250);
                $this->addMediaConversion('profile-thumb')
                    ->width(100)
                    ->height(100) ;
            });
    }

}
