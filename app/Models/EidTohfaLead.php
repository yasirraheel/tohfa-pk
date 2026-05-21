<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EidTohfaLead extends Model
{
    protected $fillable = [
        'cnic',
        'latitude',
        'longitude',
        'accuracy',
        'location_captured_at',
        'bank_name',
        'account_number',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'accuracy' => 'decimal:2',
        'location_captured_at' => 'datetime',
    ];
}
