<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// routes l'authentification
Route::middleware('auth')->group(function () {
    // Modification du profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Mise à jour du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Suppression du profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Gestion des Taches 
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
});


require __DIR__.'/auth.php';
