<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Get a single setting value by key, with an optional fallback.
     */
    public static function get(string $key, mixed $fallback = null): mixed
    {
        $settings = static::allCached();
        return $settings[$key] ?? $fallback;
    }

    /**
     * Save an array of key => value pairs.
     */
    public static function saveAll(array $data): void
    {
        foreach ($data as $key => $value) {
            static::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        Cache::forget('site_settings');
    }

    /**
     * Return all settings as a key => value array (cached for 60 min).
     */
    public static function allCached(): array
    {
        return Cache::remember('site_settings', 3600, function () {
            return static::pluck('value', 'key')->toArray();
        });
    }
}
