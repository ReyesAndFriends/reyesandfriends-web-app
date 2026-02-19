<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\ContactFormReply;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactForm::all();
        return response()->json($contacts);
    }

    public function show($id)
    {
        $contact = ContactForm::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Formulario de contacto no encontrado'], 404);
        }

        return response()->json($contact);
    }

    public function reply(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Formulario de contacto no encontrado'], 404);
        }

        try {
            $request->validate([
                'message' => 'required|string',
                'responder_name' => 'required|string',
                'responder_email' => 'required|email',
            ],[
                'message.required' => 'El campo de mensaje es requerido.',
                'message.string' => 'El mensaje debe ser una cadena de texto.',
                'responder_name.required' => 'El nombre del respondedor es requerido.',
                'responder_name.string' => 'El nombre del respondedor debe ser una cadena de texto.',
                'responder_email.required' => 'El correo electrónico del respondedor es requerido.',
                'responder_email.email' => 'El correo electrónico del respondedor debe ser una dirección válida.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $e->errors(),
            ], 422);
        }

        if ($contact->replied == true) {
            return response()->json(['message' => 'Este formulario de contacto ya ha sido respondido'], 400);
        } else {

            ContactFormReply::create([
                'contact_form_id' => $contact->id,
                'message' => $request->message,
                'responder_name' => $request->responder_name,
                'responder_email' => $request->responder_email,
            ]);

            $contact->replied = true;
            $contact->save();

            return response()->json(['message' => 'Se ha respondido al formulario de contacto exitosamente']);
        }
    }
}
