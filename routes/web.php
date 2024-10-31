<?php

use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DepartementController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');

// Route sécurisé
Route::middleware('auth')->group(function() {
  Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');

  Route::prefix('employers')->group(function() {
    Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
    Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
    Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
    Route::post('/store', [EmployerController::class, 'store'])->name('employer.store');
    Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');
    Route::get('/{employer}', [EmployerController::class, 'delete'])->name('employer.delete');
  });
  
  Route::prefix('departements')->group(function() {
    Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
    Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
    Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
    Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
    Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
    Route::get('/delete/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
  });
});
