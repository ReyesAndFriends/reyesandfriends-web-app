<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::all();

        $visitors = Visitor::paginate(15);

        return response()->json($visitors);
    }

    public function show($id)
    {
        $visitor = Visitor::find($id);

        if ($visitor) {
            return response()->json($visitor);
        } else {
            return response()->json(['message' => 'Visitor not found.'], 404);
        }
    }

    public function get_by_ip($ip)
    {
        $visitors = Visitor::where('ip_address', $ip)->get();

        if ($visitors->isNotEmpty()) {
            return response()->json($visitors);
        } else {
            return response()->json(['message' => 'No visitors found for this IP.'], 404);
        }

    }
}
