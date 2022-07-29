<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable=[
     'user_id','template_id', 'personal_info','intro','education',
     'experience','social_media','hard_skills','soft_skills',
     'language','references','certifications','status','hobbies'
    ];

    public function template(){
        return $this->belongsTo(Template::class);
    }
}
