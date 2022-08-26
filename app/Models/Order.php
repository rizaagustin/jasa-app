<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'Order';
    protected $dates = [
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];

     protected $fillable = [
        'service_id', 
        'freelancer_id',
        'buyyer_id',
        'file',
        'note',
        'expired',
        'order_status_id',
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];    
    //one to many
    public function user_buyer(){
        return $this->belongsTo('Apps\Models\User','buyer_id','id');
    }

    public function user_freelancer(){
        return $this->belongsTo('Apps\Models\User','freelancer_id','id');
    }

    //one to many
    public function service(){
        return $this->belongsTo('Apps\Models\Service','service_id','id');
    }

    // one to many
    public function order_status(){
        return $this->belongsTo('Apps\Models\OrderStatus','order_status_id','id');
    }
}
