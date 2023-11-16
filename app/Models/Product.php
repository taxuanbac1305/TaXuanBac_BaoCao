<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'db_product'; 

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'image',
        'detail',
        'description',
        'price',
        'created_by',
        'update_by',
        'status',
    ];
}
