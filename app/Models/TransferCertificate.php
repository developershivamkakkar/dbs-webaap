<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_number',
        'student_name',
        'father_name',
        'session',
        'tc_file_path',
    ];
}
