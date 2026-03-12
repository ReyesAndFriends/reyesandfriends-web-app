<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteProjectImage extends Model
{
    protected $fillable = [
        'quote_project_id',
        'image_path',
    ];

    public function quoteProject()
    {
        return $this->belongsTo(QuoteProject::class);
    }
}
