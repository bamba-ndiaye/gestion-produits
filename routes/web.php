<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [AuthController::class, 'register'])->name('inscription');
    Route::post('/inscription', [AuthController::class, 'storeRegister'])->name('inscription.store');

    Route::get('/connexion', [AuthController::class, 'login'])->name('connexion');
    Route::post('/connexion', [AuthController::class, 'storeLogin'])->name('connexion.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/tableau-de-bord', [AuthController::class, 'tableauDeBord'])->name('tableau-de-bord');
    Route::post('/deconnexion', [AuthController::class, 'logout'])->name('deconnexion');
});

// TEMPORAIRE : remplacé aux étapes 5 et 6
Route::middleware('auth')->group(function () {
    Route::get('/vendeur', fn () => 'Bonjour le vendeur ! (temporaire)')->name('vendeur.accueil');
    Route::get('/produits', fn () => 'Liste des produits (temporaire)')->name('produits.index');
});