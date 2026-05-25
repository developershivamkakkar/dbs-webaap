<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'student_name',
        'class_name',
        'title',
        'description',
        'image_path',
    ];
}
