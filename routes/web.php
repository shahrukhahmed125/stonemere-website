<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

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

Route::get('/run-migrations', function () {
    Artisan::call('migrate', ['--force' => true]);

    return nl2br(Artisan::output());
});


Route::get('/run-seeders', function () {
    Artisan::call('db:seed', ['--force' => true]);

    return nl2br(Artisan::output());
});

Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    if (file_exists($link)) {
        return 'Storage link or directory already exists.';
    }

    if (!File::exists($target)) {
        return 'Storage target directory does not exist.';
    }

    File::link($target, $link);

    return 'Storage link created successfully.';
});

Route::get('/optimize-app', function () {
    Artisan::call('optimize');

    return nl2br(Artisan::output());
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');

    return nl2br(Artisan::output());
});