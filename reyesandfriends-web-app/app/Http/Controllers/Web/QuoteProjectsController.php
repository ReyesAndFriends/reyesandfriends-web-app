<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuoteProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteProjectSubmitted;

class QuoteProjectsController extends Controller
{
    private function normalizeChileanPhone(?string $phone): ?string
    {
        if ($phone === null) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $phone);

        if ($digits === '') {
            return null;
        }

        // Aceptar formatos: 9XXXXXXXX, +569XXXXXXXX, 569XXXXXXXX
        if (strlen($digits) === 9) {
            return '+56' . $digits;
        }

        if (strlen($digits) === 11 && str_starts_with($digits, '56')) {
            return '+' . $digits;
        }

        return null;
    }

    public function quoteForm()
    {
        return view('create.quote-project');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120',
            'description' => 'required|string|min:20|max:2500',
            'client_name' => 'required|string|max:100',
            'client_email' => 'required|email|max:100',
            'client_phone' => ['nullable', 'string', 'regex:/^(?:9\d{8}|56(?:9\d{8})|\+56(?:9\d{8}))$/'],
            'extra_info' => 'nullable|string|max:1200',
            'photos' => [
                'nullable',
                'array',
                'max:5',
                function ($attribute, $value, $fail) {
                    if (!$value || !is_array($value)) {
                        return;
                    }

                    $totalSize = 0;
                    foreach ($value as $file) {
                        if ($file) {
                            $totalSize += $file->getSize();
                        }
                    }

                    if ($totalSize > 12 * 1024 * 1024) {
                        $fail('El peso total de las imágenes no puede superar 12MB.');
                    }
                },
            ],
            'photos.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
            'cf-turnstile-response' => 'required',
        ], [
            'name.required' => 'El nombre del proyecto es obligatorio.',
            'name.max' => 'El nombre del proyecto no puede exceder 120 caracteres.',
            'description.required' => 'La descripción del proyecto es obligatoria.',
            'description.min' => 'La descripción debe tener al menos 20 caracteres.',
            'description.max' => 'La descripción no puede exceder 2500 caracteres.',
            'client_name.required' => 'El nombre de contacto es obligatorio.',
            'client_name.max' => 'El nombre de contacto no puede exceder 100 caracteres.',
            'client_email.required' => 'El correo electrónico es obligatorio.',
            'client_email.email' => 'El correo electrónico debe ser válido.',
            'client_email.max' => 'El correo electrónico no puede exceder 100 caracteres.',
            'client_phone.regex' => 'El teléfono debe tener formato válido (9 dígitos o +569XXXXXXXX).',
            'extra_info.max' => 'La información adicional no puede exceder 1200 caracteres.',
            'photos.array' => 'Las imágenes deben enviarse en formato válido.',
            'photos.max' => 'Puedes subir un máximo de 5 imágenes.',
            'photos.*.image' => 'Cada archivo debe ser una imagen.',
            'photos.*.mimes' => 'Las imágenes deben estar en formato JPEG, PNG o WEBP.',
            'photos.*.max' => 'Cada imagen puede pesar hasta 4MB.',
            'cf-turnstile-response.required' => 'Por favor verifica que no eres un robot.',
        ]);

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
            return redirect()->route('quote_project.form')
                ->withErrors(['cf-turnstile-response' => 'No se pudo verificar el captcha. Intenta nuevamente.'])
                ->withInput();
        }

        DB::transaction(function () use ($request) {
            $normalizedPhone = $this->normalizeChileanPhone($request->client_phone);

            $quoteProject = QuoteProject::create([
                'name' => ucfirst(trim($request->name)),
                'description' => trim($request->description),
                'client_name' => ucwords(trim($request->client_name)),
                'client_email' => strtolower(trim($request->client_email)),
                'client_phone' => $normalizedPhone,
                'extra_info' => $request->extra_info ? trim($request->extra_info) : null,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $storedPath = $photo->store('quote-projects', 'public');

                    $quoteProject->images()->create([
                        'image_path' => $storedPath,
                    ]);
                }
            }

            Mail::to($quoteProject->client_email)->queue(new QuoteProjectSubmitted(
                name: $quoteProject->name,
                description: $quoteProject->description,
                client_name: $quoteProject->client_name,
                client_email: $quoteProject->client_email,
                client_phone: $quoteProject->client_phone ?? 'No proporcionado',
                extra_info: $quoteProject->extra_info ?? 'No proporcionada',
            ));

        });

        

        return redirect()->route('quote_project.form')->with('success', 'Tu solicitud de cotización fue enviada correctamente. Te contactaremos pronto.');
    }
}
