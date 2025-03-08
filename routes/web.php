<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\CursusController;
use App\Http\Controllers\EmploisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HierarchyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DemandeRecuperationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour le profil
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});

// // Routes pour les congés (gestion)
// Route::middleware(['auth', 'can:maange Conges'])->prefix('conges')->name('conges.')->group(function () {
//     Route::get('/gestion', [CongeController::class, 'gestion'])->name('gestion');
//     Route::post('/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('managerApprove');
//     Route::post('/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('rhApprove');
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
//     Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
//     Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
//     Route::get('/conges/gestion', [CongeController::class, 'gestion'])->name('conges.gestion');
//     Route::post('/conges/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('conges.managerApprove');
//     Route::post('/conges/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('conges.rhApprove');
//     Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde');
//     Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
// });

// // Routes pour les demandes de congés
// Route::middleware(['auth', 'can:demande conges'])->prefix('conges')->name('conges.')->group(function () {
//     Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
//     Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
//     Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
// });

// // Routes pour les notifications
// Route::middleware(['auth', 'can:notification'])->prefix('notifications')->name('notifications.')->group(function () {
//     Route::get('/', [NotificationController::class, 'index'])->name('index');
// });

// // Routes pour les départements
// Route::middleware(['auth', 'can:maange Departments'])->prefix('departments')->name('departments.')->group(function () {
//     Route::get('/', [DepartmentController::class, 'index'])->name('index');
//     Route::get('/create', [DepartmentController::class, 'create'])->name('create');
//     Route::post('/', [DepartmentController::class, 'store'])->name('store');
//     Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('edit');
//     Route::put('/{department}', [DepartmentController::class, 'update'])->name('update');
//     Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('destroy');
// });

// // Routes pour les emplois
// Route::middleware(['auth', 'can:maange Emplyois'])->prefix('emplois')->name('emplois.')->group(function () {
//     Route::get('/', [EmploisController::class, 'index'])->name('index');
//     Route::get('/create', [EmploisController::class, 'create'])->name('create');
//     Route::post('/', [EmploisController::class, 'store'])->name('store');
//     Route::get('/{emploi}/edit', [EmploisController::class, 'edit'])->name('edit');
//     Route::put('/{emploi}', [EmploisController::class, 'update'])->name('update');
//     Route::delete('/{emploi}', [EmploisController::class, 'destroy'])->name('destroy');
// });

// // Routes pour les contrats
// Route::middleware(['auth', 'can:manage Emplyees'])->prefix('contracts')->name('contracts.')->group(function () {
//     Route::get('/', [ContractController::class, 'index'])->name('index');
//     Route::get('/create', [ContractController::class, 'create'])->name('create');
//     Route::post('/', [ContractController::class, 'store'])->name('store');
//     Route::get('/{contract}/edit', [ContractController::class, 'edit'])->name('edit');
//     Route::put('/{contract}', [ContractController::class, 'update'])->name('update');
//     Route::delete('/{contract}', [ContractController::class, 'destroy'])->name('destroy');
// });

// // Routes pour la gestion des utilisateurs
// Route::middleware(['auth', 'can:manage Emplyees'])->prefix('users')->name('users.')->group(function () {
//     Route::get('/', [UserController::class, 'index'])->name('index');
//     Route::get('/create', [UserController::class, 'create'])->name('create');
//     Route::post('/', [UserController::class, 'store'])->name('store');
//     Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
//     Route::put('/{user}', [UserController::class, 'update'])->name('update');
//     Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
//     Route::get('/{user}/details', [UserController::class, 'details'])->name('details');
// });


// // Routes pour les cursus
// Route::middleware(['auth', 'can:manage Emplyees'])->prefix('cursus')->name('cursus.')->group(function () {
//     Route::get('/create/{user}', [CursusController::class, 'create'])->name('create');
//     Route::post('/', [CursusController::class, 'store'])->name('store');
//     Route::get('/{cursus}/edit', [CursusController::class, 'edit'])->name('edit');
//     Route::put('/{cursus}', [CursusController::class, 'update'])->name('update');
// });

// // Routes pour la hiérarchie
// Route::middleware(['auth', 'can:maange Hierarchy'])->prefix('hierarchy')->name('hierarchy.')->group(function () {
//     Route::get('/', [HierarchyController::class, 'hierarchy'])->name('index');
// });

// // Routes pour les demandes de récupération (employés)
// Route::middleware(['auth', 'can:demande recuperation'])->prefix('demandes_recuperation')->name('demandes_recuperation.')->group(function () {
//     Route::get('/', [DemandeRecuperationController::class, 'index'])->name('index');
//     Route::get('/create', [DemandeRecuperationController::class, 'create'])->name('create');
//     Route::post('/', [DemandeRecuperationController::class, 'store'])->name('store');
// });

// // Routes pour la gestion des demandes de recuperation (RH)
// Route::middleware(['auth', 'can:manage recuperation'])->prefix('demandes_recuperation')->name('demandes_recuperation.')->group(function () {
//     Route::post('/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('updateStatut');
// });

// // Route pour des demandes (tous les utilisateurs authentifiés)
// Route::middleware('auth')->prefix('demandes_recuperation')->name('demandes_recuperation.')->group(function () {
//     Route::get('/{id}', [DemandeRecuperationController::class, 'show'])->name('show');
// });




Route::middleware('auth')->group(function () {
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
    Route::get('/conges/gestion', [CongeController::class, 'gestion'])->name('conges.gestion');
    Route::post('/conges/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('conges.managerApprove');
    Route::post('/conges/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('conges.rhApprove');
    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('emplois', EmploisController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('users', UserController::class);
    Route::resource('cursus', CursusController::class);
    Route::get('/cursus/create/{user}', [CursusController::class, 'create'])->name('cursus.create');
    Route::post('/cursus', [CursusController::class, 'store'])->name('cursus.store');
    Route::get('/cursus/{cursus}/edit', [CursusController::class, 'edit'])->name('cursus.edit'); 
    Route::put('/cursus/{cursus}', [CursusController::class, 'update'])->name('cursus.update');
    Route::get('/users/{user}', [CursusController::class, 'show'])->name('users.show');
    Route::get('/emplois-by-department/{department_id}', [CursusController::class, 'getEmploisByDepartment'])->name('emplois.by.department');
    Route::get('/hierarchy', [HierarchyController::class, 'hierarchy'])->name('hierarchy.index');
    Route::resource('demandes_recuperation', DemandeRecuperationController::class)->except(['edit', 'update']);
Route::post('/demandes_recuperation/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('demandes_recuperation.updateStatut');
Route::get('/demandes_recuperation/{id}', [DemandeRecuperationController::class, 'show'])->name('demandes_recuperation.show');
});



require __DIR__.'/auth.php';
