<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'service';
    protected $dates = [
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];

     protected $fillable = [
        'user_id', 
        'title', 
        'description', 
        'delivery_time', 
        'revision_limit',
        'price',
        'note',
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];    

    public function user(){
        return $this->belongsTo('Apps\Models\User','user_id','id');
    }

    //one to many
    public function advantage_user(){
        return $this->hasMany('Apps\Models\AdvantageUser','service_id');
    }

    public function tagline(){
        return $this->hasMany('Apps\Models\Tagline','service_id');
    }

    public function advantage_service(){
        return $this->hasMany('Apps\Models\AdvantageService','service_id');
    }

    public function thumbnail_service(){
        return $this->hasMany('Apps\Models\ThumbnailService','service_id');
    }

    public function order(){
        return $this->hasMany('Apps\Models\Order','service_id');
    }

}
