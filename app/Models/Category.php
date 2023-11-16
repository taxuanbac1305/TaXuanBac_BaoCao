<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'db_category'; 

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'parent_id',
        'description',
        'image',
        'created_by',
        'update_by',
        'status',
    ];
}
