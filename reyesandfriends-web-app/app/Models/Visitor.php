<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'country',
        'user_agent',
        'cookie_level',
        'referer',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];
}
