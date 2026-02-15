<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'cellphone',
        'message',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(ContactCategory::class);
    }
}
