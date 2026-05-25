<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',          // Title of the blog
        'slug',           // URL-friendly version of the title
        'content',        // Main content of the blog
        'published_date', // Event's publication date
        'status',
        'event_image_path',
        'event_date'

    ];

    protected $casts = [
        'published_date' => 'datetime',
        'event_date' => 'datetime',
    ];


}
