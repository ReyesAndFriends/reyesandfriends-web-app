<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function contactForms()
    {
        return $this->hasMany(ContactForm::class);
    }
}
