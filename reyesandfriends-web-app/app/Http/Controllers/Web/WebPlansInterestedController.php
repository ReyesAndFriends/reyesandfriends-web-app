<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebPlanInterested;
use App\Models\WebPlan;

class WebPlansInterestedController extends Controller
{
    public function interest_form($slug)
    {
        $webPlan = WebPlan::where('slug', $slug)->first();

        if (!$webPlan) {
            return redirect()->route('web_plans')->with('error', 'Plan Web no encontrado. Por favor, revise la URL e intente nuevamente.');
        }

        return view('create.web_plan_interested', compact('webPlan'));
    }

    public function store(Request $request, $slug)
    {
        $webPlan = WebPlan::where('slug', $slug)->first();

        if (!$webPlan) {
            return redirect()->route('web_plans')->with('error', 'Plan Web no encontrado. Por favor, revise la URL e intente nuevamente.');
        }

        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'cellphone' => 'nullable|string|size:9',
        ],[
            'first_name.required' => 'El campo nombre es obligatorio.',
            'first_name.string' => 'El campo nombre debe ser una cadena de texto.',
            'first_name.max' => 'El campo nombre no puede tener más de 50 caracteres.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de texto.',
            'last_name.max' => 'El campo apellido no puede tener más de 50 caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no puede tener más de 100 caracteres.',
            'cellphone.string' => 'El campo celular debe ser una cadena de texto.',
            'cellphone.size' => 'El campo celular debe tener exactamente 9 caracteres.',
        ]);

        if (WebPlanInterested::where('web_plan_id', $webPlan->id)->where('email', $request->email)->exists()) {
            $existingInterest = WebPlanInterested::where('web_plan_id', $webPlan->id)->where('email', $request->email)->first();
            return redirect()->route('web_plans')->with('error', 'Ya existe una cotización registrada con este correo electrónico para este plan. Creada el ' . $existingInterest->created_at->format('d/m/Y') . '.');
        }

        WebPlanInterested::create([
            'web_plan_id' => $webPlan->id,
            'first_name' => ucwords($request->first_name),
            'last_name' => ucwords($request->last_name),
            'email' => $request->email,
            'cellphone' => $request->cellphone,
        ]);

        return redirect()->route('web_plans')->with('success', '¡Gracias por tu interés! Nos pondremos en contacto contigo pronto.');
    }
}