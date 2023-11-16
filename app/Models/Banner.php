<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'db_banner';
    protected $fillable = [
        'name',
        'image',
        'link',
        'position',
        'description',
        'created_by',
        'update_by',
        'status'
    ];

}
