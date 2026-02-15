<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebPlan;

class WebPlansController extends Controller
{
    public function index()
    {
        $webPlans = WebPlan::all();
        return view('web_plans', compact('webPlans'));
    }

    public function show($slug)
    {
        $webPlan = WebPlan::where('slug', $slug)->first();

        if (!$webPlan) {
            return redirect()->route('web_plans')->with('error', 'Este plan web no existe. Por favor, verifique la URL.');
        }

        return view('show.web_plan', compact('webPlan'));
    }
}
