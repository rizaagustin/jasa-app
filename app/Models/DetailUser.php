<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'detail_users';
    protected $dates = [
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];

    protected $fillable = [
        'users_id', 
        'photo', 
        'role',
        'contact_number',
        'biography',
        'updated_at', 
        'created_at', 
        'deleted_at',
    ];

    //one to one
    public function user(){
        return $this->belongsTo('Apps\Models\User','user_id','id');
    }

    //one to many
    public function experience_user(){
        return $this->hasMany('Apps\Models\ExperienceUser','detail_user_id');
    }

}