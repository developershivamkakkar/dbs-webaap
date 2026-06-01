<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LandingSetting extends Model
{
    protected $table    = 'landing_settings';
    protected $fillable = ['key', 'value'];

    public static function get(string $key, string $default = ''): string
    {
        return static::allCached()[$key] ?? $default;
    }

    public static function saveAll(array $data): void
    {
        foreach ($data as $key => $value) {
            static::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        Cache::forget('landing_settings');
    }

    public static function allCached(): array
    {
        return Cache::remember('landing_settings', 3600, fn () =>
            static::pluck('value', 'key')->toArray()
        );
    }
}
