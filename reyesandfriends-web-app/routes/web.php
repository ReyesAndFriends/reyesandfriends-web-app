<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\WebPlansController;
use App\Http\Controllers\Web\WebPlansInterestedController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planes-web', [WebPlansController::class, 'index'])->name('web_plans');
Route::get('/planes-web/{slug}', [WebPlansController::class, 'show'])->name('web_plans.show');
Route::get('/planes-web/{slug}/cotizar', [WebPlansInterestedController::class, 'interest_form'])->name('web_plans.interest_form');
Route::post('/planes-web/{slug}/cotizar', [WebPlansInterestedController::class, 'store'])->name('web_plans.interest_store');