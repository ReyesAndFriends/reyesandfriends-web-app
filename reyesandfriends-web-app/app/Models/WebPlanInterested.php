<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPlanInterested extends Model
{
    protected $fillable = [
        'web_plan_id',
        'first_name',
        'last_name',
        'email',
        'cellphone',
    ];

    public function webPlan()
    {
        return $this->belongsTo(WebPlan::class);
    }
}
