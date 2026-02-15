<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPlanUsage extends Model
{
    protected $fillable = [
        'web_plan_id',
        'usage'
    ];

    public function webPlan()
    {
        return $this->belongsTo(WebPlan::class, 'web_plan_id');
    }
}
