<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'db_orderdetail'; 

    protected $fillable = [
        'order_id', // Add 'order_id' to the fillable array
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
    ];

}
