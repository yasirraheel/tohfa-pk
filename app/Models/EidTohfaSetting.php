<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EidTohfaSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description'
    ];

    public function getValueAttribute($value)
    {
        return self::normalizeValue($value);
    }

    public static function normalizeValue($value)
    {
        if (! is_string($value)) {
            return $value;
        }

        $trimmed = trim($value);

        if (! str_starts_with($trimmed, '"') || ! str_ends_with($trimmed, '"')) {
            return $value;
        }

        $decoded = json_decode($trimmed, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : $value;
    }

    public static function getSetting($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function imageUrl($value, $default = null)
    {
        $value = self::normalizeValue($value ?: $default);

        if (blank($value)) {
            return '';
        }

        if (preg_match('/^(https?:)?\/\//i', $value) || str_starts_with($value, 'data:')) {
            return $value;
        }

        $path = ltrim(str_replace('\\', '/', $value), '/');

        if (str_starts_with($path, 'public/')) {
            return url($path);
        }

        return url('public/' . $path);
    }

    public static function setSetting($key, $value, $type = 'text', $group = 'general', $description = '')
    {
        return self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
                'description' => $description
            ]
        );
    }
}
