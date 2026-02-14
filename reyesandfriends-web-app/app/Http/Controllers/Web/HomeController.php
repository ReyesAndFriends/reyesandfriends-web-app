<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WebPlan;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $cheaperWebPlan = WebPlan::orderBy('price_clp', 'asc')->first();

        return view('home', compact('services', 'cheaperWebPlan'));
    }
}
