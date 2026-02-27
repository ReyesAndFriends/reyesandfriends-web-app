<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebPlanInterested;
use Illuminate\Validation\ValidationException;

class WebPlanInterestedController extends Controller
{
    public function index()
    {
        $interests = WebPlanInterested::all();
        return response()->json($interests);
    }

    public function show($id)
    {
        $interest = WebPlanInterested::find($id);

        if (!$interest) {
            return response()->json(['message' => 'Interesado en plan web no encontrado'], 404);
        }

        return response()->json($interest);
    }
}
