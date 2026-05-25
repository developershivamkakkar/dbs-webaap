<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_name',
        'album_parent_menu'
    ];


    // One to Many Relationship between Album and Images
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'album_id');
    }
}
