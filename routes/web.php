<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebsiteController::class, 'home'])->name('home');