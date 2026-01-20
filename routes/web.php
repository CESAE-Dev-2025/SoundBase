<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UtilController::class, 'home'])
    ->name('homepage');

// --------------------------------------------------------------- Bands Routes
Route::get('/bands', [BandController::class, 'index'])
    ->name('bands.all')->middleware('auth');

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

// --------------------------------------------------------------- Users Routes
Route::get('/users', [UserController::class, 'index'])
    ->name('users.all'); //->middleware('auth');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.view');

Route::get('/delete-user/{id}', [UserController::class, 'destroy'])
    ->name('users.delete');

// Rotas para adicionar user
Route::get('/add-users', [UserController::class, 'create'])
    ->name('users.add');

Route::post('/users/store-user', [UserController::class, 'store'])
    ->name('users.store');

// Rota para atualizar user
Route::put('/update-user', [UserController::class, 'update'])
    ->name('users.update');

// ------------------------------------------------------------------- Fallback
Route::fallback([UtilController::class, 'fallback']);
