<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\FrotaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class,'create'])->name('home-login');
/*
Route::get('/home', [FrotaController::class, 'showHome'])->middleware(['auth', 'verified'])->name('mostrar-home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/



Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('mostrar-home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [ProfileController::class,'edit'])->name('dashboard');

    Route::get('/gerenciar-frota', [FrotaController::class,'gerenciarFrota'])->name('gerenciar-frota');

    Route::get('/alterar-frota/{id}', [FrotaController::class,'mostrarFrotaId'])->name('mostrar-frota-id');

    Route::get('/salvar-frota', [FrotaController::class,'showFormulario'])->name('mostrar-formulario');

    Route::post('/salvar-frota', [FrotaController::class,'salvarFrota'])->name('cadastrar-formulario');

    Route::delete('/apaga-frota/{id}', [FrotaController::class, 'destroy'])->name('apagar-frota');

    Route::put('/alterar-frota/{id}', [FrotaController::class, 'update'])->name('alterar-frota');
});

require __DIR__.'/auth.php';