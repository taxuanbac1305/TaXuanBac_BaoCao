<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'db_post'; 
    protected $fillable = [
        'cate_post_id',
        'title',
        'slug',
        'content',
        'description',
        'meta_keywords',
        'meta_desc',
        'image',
        'created_by',
        'update_by',
        'status',
    ];
    public function cate_post(){
        return $this->belongsTo('App\Models\CategoryPost','id');
    }

}
