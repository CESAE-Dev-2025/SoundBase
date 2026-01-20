<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UtilController::class, 'home'])
    ->name('homepage');

// --------------------------------------------------------------- Bands Routes
Route::get('/bands', [BandController::class, 'index'])
    ->name('bands.all'); // ->middleware('auth');

Route::get('/bands/{id}', [BandController::class, 'show'])
    ->name('bands.view');

Route::get('/delete-band/{id}', [BandController::class, 'destroy'])
    ->name('bands.delete');

// Rotas para adicionar band
Route::get('/add-band', [BandController::class, 'create'])
    ->name('bands.add');

Route::post('/bands/store-band', [BandController::class, 'store'])
    ->name('bands.store');

// Rota para atualizar band
Route::put('/update-band', [BandController::class, 'update'])
    ->name('bands.update');

// ------------------------------------------------------------------- Fallback
Route::fallback([UtilController::class, 'fallback']);
