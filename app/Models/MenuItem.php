<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'parent_id',
        'display_order',
        'status'
    ];
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function pageContent()
    {
        return $this->hasOne(PageContent::class, 'menu_item_id');
    }

    /**
     * Resolve the correct href for this menu item.
     * - Absolute URLs (http/https) are returned as-is.
     * - Paths starting with / are returned as-is.
     * - Everything else is treated as a page-editor slug.
     */
    public function getHrefAttribute(): string
    {
        if (!$this->url) {
            return '#';
        }
        if (str_starts_with($this->url, 'http') || str_starts_with($this->url, '/')) {
            return $this->url;
        }
        return route('show.page', ['slug' => $this->url]);
    }
}
