<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPlanImage extends Model
{
    protected $fillable = [
        'web_plan_id',
        'image_url'
    ];

    public function webPlan()
    {
        return $this->belongsTo(WebPlan::class);
    }
}
