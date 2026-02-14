<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPlan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'demo_url',
        'price_clp',
        'number_of_months',
        'final_price_clp'
    ];

    public function images()
    {
        return $this->hasMany(WebPlanImage::class);
    }
}
