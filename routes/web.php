<?php

use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ------------------------------------------------------------------- Fallback
Route::fallback([UtilController::class, 'fallback']);
