<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobEnquiry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "email",
        "phone_number",
        "qualification",
        "position_applied",
        "message",
        'resume_file_path'
    ];
}
