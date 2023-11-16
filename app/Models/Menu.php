<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'db_menu';
    protected $fillable = [
        'name',
        'link',
        'sort_order',
        'table_id',
        'parent_id',
        'type',
        'description',
        'created_by',
        'update_by',
        'status',
    ];


}
