<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'db_categorypost'; 
    protected $fillable = [
        'name',
        'slug',
        'description',
        'created_by',
        'update_by',
        'status',
    ];
}
