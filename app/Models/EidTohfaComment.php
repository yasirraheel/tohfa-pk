<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EidTohfaComment extends Model
{
    protected $fillable = [
        'user_name',
        'avatar_url',
        'comment_text',
        'time_ago',
        'is_liked',
        'is_reply',
        'order',
        'status'
    ];

    protected $casts = [
        'is_liked' => 'boolean',
        'is_reply' => 'boolean',
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }
}
