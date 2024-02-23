<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'meta_title',
    'meta_description',
    'slug',
    'thumbnail',
    'short_description',
    'content',
    ];
}
