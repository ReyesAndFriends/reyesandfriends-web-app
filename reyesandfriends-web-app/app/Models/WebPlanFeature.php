<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPlanFeature extends Model
{
    protected $fillable = [
        'plan_id',
        'feature',
    ];

    public function plan()
    {
        return $this->belongsTo(WebPlan::class, 'plan_id');
    }
}
