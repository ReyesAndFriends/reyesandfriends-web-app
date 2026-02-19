<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\WebPlansController;
use App\Http\Controllers\Web\WebPlansInterestedController;
use App\Http\Controllers\Web\HowWorksController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\PortfolioController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\FaqController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/planes-web', [WebPlansController::class, 'index'])->name('web_plans');
Route::get('/planes-web/{slug}', [WebPlansController::class, 'show'])->name('web_plans.show');
Route::get('/planes-web/{slug}/cotizar', [WebPlansInterestedController::class, 'interest_form'])->name('web_plans.interest_form');
Route::post('/planes-web/{slug}/cotizar', [WebPlansInterestedController::class, 'store'])->name('web_plans.interest_store');
Route::get('/como-funciona', [HowWorksController::class, 'index'])->name('how_works');
Route::get('/contacto', [ContactController::class, 'contactForm'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');
Route::get('/nosotros', [AboutUsController::class, 'index'])->name('about_us');
Route::get('/portafolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/preguntas-frecuentes', [FaqController::class, 'index'])->name('faq');