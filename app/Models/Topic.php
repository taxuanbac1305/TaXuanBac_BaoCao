<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'db_topic';

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'description',
        'created_by',
        'update_by',
        'status',
    ];


}
