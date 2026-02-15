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

    public function features()
    {
        return $this->hasMany(WebPlanFeature::class);
    }

    public function usages()
    {
        return $this->hasMany(WebPlanUsage::class);
    }

    public function interested()
    {
        return $this->hasMany(WebPlanInterested::class);
    }
}
