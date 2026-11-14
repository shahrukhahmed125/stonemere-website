<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;


Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/team', [WebsiteController::class, 'team'])->name('team');
Route::get('/professionals', [WebsiteController::class, 'professionals'])->name('professionals');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/price-menu', [WebsiteController::class, 'priceMenu'])->name('price-menu');
Route::get('/family-client-support', [WebsiteController::class, 'familyClientSupport'])->name('family-client-support');
Route::get('/care-professional-liaison', [WebsiteController::class, 'careProfessionalLiaison'])->name('care-professional-liaison');
Route::get('/property-asset-management', [WebsiteController::class, 'propertyAssetManagement'])->name('property-asset-management');
Route::get('/urgent-complex-cases', [WebsiteController::class, 'urgentComplexCases'])->name('urgent-complex-cases');
Route::get('/privacy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('/terms', [WebsiteController::class, 'terms'])->name('terms');




