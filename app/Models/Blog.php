<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',          // Title of the blog
        'slug',           // URL-friendly version of the title
        'content',        // Main content of the blog
        'published_date', // Blog's publication date
        'status',
        'blog_image_path',      // Status of the blog (draft, published, archived)
        'author'
    ];

    protected $casts = [
        'published_date' => 'datetime',
    ];
}

