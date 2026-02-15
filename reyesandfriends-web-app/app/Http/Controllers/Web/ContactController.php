<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\ContactFormCategory;

class ContactController extends Controller
{
    public function contactForm()
    {
        $categories = ContactFormCategory::all();
        return view('create.contact' , compact('categories'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'message' => 'required|min:20|max:1000',
                'category_slug' => 'required|exists:contact_form_categories,slug',
                'cf-turnstile-response' => 'required',
            ],[
                'first_name.required' => 'El campo nombre es requerido.',
                'last_name.required' => 'El campo apellido es requerido.',
                'email.required' => 'El campo correo es requerido.',
                'email.email' => 'El correo debe ser válido.',
                'message.required' => 'El campo mensaje es requerido.',
                'message.min' => 'El mensaje debe tener al menos 20 caracteres.',
                'message.max' => 'El mensaje no puede exceder 1000 caracteres.',
                'category_slug.required' => 'El campo categoría es requerido.',
                'category_slug.exists' => 'La categoría seleccionada es inválida.',
                'cf-turnstile-response.required' => 'Por favor verifica que no eres un robot.',
            ]);

            // Validar Turnstile
            $turnstileResponse = $request->input('cf-turnstile-response');
            $turnstileSecret = config('turnstile.secret_key', config('app.turnstile.secret_key'));
            $remoteIp = $request->ip();
            $verifyResponse = null;
            if ($turnstileResponse && $turnstileSecret) {
                $verifyResponse = \Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $turnstileSecret,
                    'response' => $turnstileResponse,
                    'remoteip' => $remoteIp,
                ]);
            }
            if (!$verifyResponse || !$verifyResponse->json('success')) {
                return redirect()->route('contact')->withErrors(['cf-turnstile-response' => 'No se pudo verificar el captcha. Intenta nuevamente.'])->withInput();
            }

        // Buscar la categoría por su slug
        
        if (!$request->category_slug) {
            return redirect()->route('contact')->withErrors(['category_slug' => 'La categoría es requerida.'])->withInput();
        }

        $category = ContactFormCategory::where('slug', $request->category_slug)->first();

        if (!$category) {
            return redirect()->route('contact')->withErrors(['category_slug' => 'La categoría seleccionada es inválida.'])->withInput();
        }

        ContactForm::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'message' => $request->message,
            'category_id' => $category->id,
        ]);

        

        return redirect()->route('contact')->with('success', '¡Tu mensaje ha sido enviado exitosamente! Nos pondremos en contacto contigo pronto.');
    }
}
