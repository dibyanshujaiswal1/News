<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
    'category_id',
    'sub_categoru_id',
    'post_name',
    'sub_title',
    'post_tag',
    'main_image',
    'relatives_image',
    'is_features',
    'status',
    'description'
];
}
