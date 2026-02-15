<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowWorksController extends Controller
{
    public function index()
    {
        return view('how_works');
    }
}
