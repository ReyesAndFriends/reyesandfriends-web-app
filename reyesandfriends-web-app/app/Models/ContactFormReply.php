<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormReply extends Model
{
    protected $fillable = [
        'contact_form_id',
        'message',
        'responder_name',
        'responder_email',
    ];

    public function contactForm()
    {
        return $this->belongsTo(ContactForm::class);
    }
}
