<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\WebPlansController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planes-web', [WebPlansController::class, 'index'])->name('web_plans');
Route::get('/planes-web/{slug}', [WebPlansController::class, 'show'])->name('web_plans.show');