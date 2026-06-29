<?php

use App\Http\Controllers\LinkRedirectController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicProfileController::class, 'index'])
    ->name('home');

Route::get('/go/{link}', [LinkRedirectController::class, 'redirect'])
    ->name('links.redirect');