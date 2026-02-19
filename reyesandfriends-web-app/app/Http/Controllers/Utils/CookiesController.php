<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;

class CookiesController extends Controller
{
    public function store(Request $request)
    {
        $cookieLevel = $request->input('cookie_level');
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        $data = [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'cookie_level' => $cookieLevel,
        ];

        if ($cookieLevel === 'all') {

            $country = null;
            try {
                $response = Http::get('http://ip-api.com/json/' . $ip);
                if ($response->successful()) {
                    $country = $response->json('country');
                }
            } catch (\Exception $e) {
                $country = null;
            }
            $data['country'] = $country;
            $data['referer'] = $request->header('Referer');
            $data['utm_source'] = $request->session()->get('utm_source');
            $data['utm_medium'] = $request->session()->get('utm_medium');
            $data['utm_campaign'] = $request->session()->get('utm_campaign');
            $data['extra_data'] = $request->input('extra_data', []);
        }

        Visitor::create($data);

        return response()->json(['success' => true]);
    }
}
