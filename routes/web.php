<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursusController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('departments', DepartmentController::class);
    Route::resource('emplois', EmploisController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('users', UserController::class);
    Route::resource('cursus', CursusController::class);
    Route::post('users/{user}/cursus', [CursusController::class, 'store'])->name('cursus.store');
    Route::get('users/{user}/cursus/create', [CursusController::class, 'create'])->name('cursus.create');
    Route::put('cursus/{cursu}', [CursusController::class, 'update'])->name('cursus.update');



});

require __DIR__.'/auth.php';
