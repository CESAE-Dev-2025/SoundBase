<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/add-band', [BandController::class, 'create'])
    ->name('bands.add');

Route::post('/bands/store-band', [BandController::class, 'store'])
    ->name('bands.store');

Route::put('/update-band', [BandController::class, 'update'])
    ->name('bands.update');

// TODO: Adicionar rotas de albuns

// --------------------------------------------------------------- Users Routes
Route::get('/users', [UserController::class, 'index'])
    ->name('users.all')->middleware('auth');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.view')->middleware('auth');

Route::get('/delete-user/{id}', [UserController::class, 'destroy'])
    ->name('users.delete')->middleware('auth');

Route::get('/add-users', [UserController::class, 'create'])
    ->name('users.add')->middleware('auth');

Route::post('/users/store-user', [UserController::class, 'store'])
    ->name('users.store')->middleware('auth');

Route::put('/update-user', [UserController::class, 'update'])
    ->name('users.update')->middleware('auth');

// ----------------------------------------------------------- Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dash.home')->middleware('auth');

// ------------------------------------------------------------------- Fallback
Route::fallback([UtilController::class, 'fallback']);
