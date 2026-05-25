<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_image_path',
        'album_id'
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
