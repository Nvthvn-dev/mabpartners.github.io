<?php

use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\TerrainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TerrainController::class, 'home'])->name('home');
Route::get('/terrains', [TerrainController::class, 'index'])->name('terrains.index');
Route::get('/terrains/{terrain}', [TerrainController::class, 'show'])->name('terrains.show');
Route::get('/rendez-vous/{terrain?}', [RendezVousController::class, 'create'])->name('rendezvous.create');
Route::post('/rendez-vous', [RendezVousController::class, 'store'])->name('rendezvous.store');
Route::get('/rendez-vous/confirmation/{rendezVous}', [RendezVousController::class, 'confirmation'])->name('rendezvous.confirmation');
