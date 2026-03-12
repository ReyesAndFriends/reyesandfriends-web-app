<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteProject extends Model
{
    protected $fillable = [
        'name',
        'description',
        'client_name',
        'client_email',
        'client_phone',
        'extra_info',
    ];

    public function images()
    {
        return $this->hasMany(QuoteProjectImage::class);
    }
}
