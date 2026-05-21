<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EidTohfaNotification extends Model
{
    protected $fillable = [
        'message',
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
}
