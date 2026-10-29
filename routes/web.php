<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function(){
    Route::get('/inscription', [AuthController::class, 'register'])->name('inscription');
    Route::post('/inscription', [AuthController::class,'storeRegister'])->name('inscription.store');
});

// TEMPORAIRE : sera remplacé à l'étape 3
Route::get('/connexion', fn () => 'Page de connexion (bientôt)')->name('connexion');
Route::get('/tableau-de-bord', fn () => 'Inscription réussie, tu es connecté !')
    ->middleware('auth')
    ->name('tableau-de-bord');