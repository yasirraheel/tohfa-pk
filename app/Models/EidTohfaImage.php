<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EidTohfaImage extends Model
{
    protected $fillable = [
        'title',
        'image_url',
        'type',
        'order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
