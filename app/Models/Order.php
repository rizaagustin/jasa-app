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
        'freelance_id',
        'buyyer_id',
        'file',
        'note',
        'expired',
        'order_status',
        'updated_at', 
        'created_at', 
        'deleted_at'
    ];    
}
