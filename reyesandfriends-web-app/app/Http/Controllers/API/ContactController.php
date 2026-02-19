<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactForm::all();
        return response()->json($contacts);
    }

    public function show($id)
    {
        $contact = ContactForm::findOrFail($id);
        return response()->json($contact);
    }
}
