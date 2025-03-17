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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Routes pour la gestion du profil (accessibles a tous les utilisateurs authentifies)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('can:manage profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('can:manage profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('can:manage profile');
});

// Routes pour la gestion des conges
Route::middleware(['auth', 'can:manage conges'])->group(function () {
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/gestion', [CongeController::class, 'gestion'])->name('conges.gestion');
    Route::post('/conges/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('conges.managerApprove');
    Route::post('/conges/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('conges.rhApprove');
});

//Routes pour demande des conges
Route::middleware(['auth', 'can:demande conges'])->group(function () {
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');   
});

// Routes pour les notifications
Route::middleware(['auth', 'can:notification'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Routes pour la gestion des departements
Route::middleware(['auth', 'can:manage departments'])->group(function () {
    Route::resource('departments', DepartmentController::class);
});

// Routes pour la gestion des emplois
Route::middleware(['auth', 'can:manage emplois'])->group(function () {
    Route::resource('emplois', EmploisController::class);
});

// Routes pour la gestion des contrats
Route::middleware(['auth', 'can:manage emplois'])->group(function () {
    Route::resource('contracts', ContractController::class);
});

// Routes pour la gestion des utilisateurs
Route::middleware(['auth', 'can:manage emplyees'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde');
});
// Routes pour voir les detailles 
Route::middleware(['auth'])->group(function () {
    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde');
});

// Routes pour la gestion des cursus
Route::middleware(['auth', 'can:manage emplyees'])->group(function () {
    Route::resource('cursus', CursusController::class);
    Route::get('/cursus/create/{user}', [CursusController::class, 'create'])->name('cursus.create');
    Route::post('/cursus', [CursusController::class, 'store'])->name('cursus.store');
    Route::get('/cursus/{cursus}/edit', [CursusController::class, 'edit'])->name('cursus.edit');
    Route::put('/cursus/{cursus}', [CursusController::class, 'update'])->name('cursus.update');
    Route::get('/emplois-by-department/{department_id}', [CursusController::class, 'getEmploisByDepartment'])->name('emplois.by.department');
});

// Routes pour la hierarchie
Route::middleware(['auth', 'can:manage hierarchy'])->group(function () {
    Route::get('/hierarchy', [HierarchyController::class, 'hierarchy'])->name('hierarchy.index');
});

// Routes pour les demandes de recuperation
Route::middleware(['auth'])->group(function () {
    Route::resource('demandes_recuperation', DemandeRecuperationController::class)->except(['edit', 'update']);
    Route::post('/demandes_recuperation/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('demandes_recuperation.updateStatut');
    Route::get('/demandes_recuperation/{id}', [DemandeRecuperationController::class, 'show'])->name('demandes_recuperation.show');
});




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

// Route::middleware('auth')->group(function () {
//     Route::resource('departments', DepartmentController::class);
//     Route::resource('emplois', EmploisController::class);
//     Route::resource('contracts', ContractController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('cursus', CursusController::class);
//     Route::get('/cursus/create/{user}', [CursusController::class, 'create'])->name('cursus.create');
//     Route::post('/cursus', [CursusController::class, 'store'])->name('cursus.store');
//     Route::get('/cursus/{cursus}/edit', [CursusController::class, 'edit'])->name('cursus.edit'); 
//     Route::put('/cursus/{cursus}', [CursusController::class, 'update'])->name('cursus.update');
//     Route::get('/users/{user}', [CursusController::class, 'show'])->name('users.show');
//     Route::get('/emplois-by-department/{department_id}', [CursusController::class, 'getEmploisByDepartment'])->name('emplois.by.department');
//     Route::get('/hierarchy', [HierarchyController::class, 'hierarchy'])->name('hierarchy.index');
//     Route::resource('demandes_recuperation', DemandeRecuperationController::class)->except(['edit', 'update']);
// Route::post('/demandes_recuperation/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('demandes_recuperation.updateStatut');
// Route::get('/demandes_recuperation/{id}', [DemandeRecuperationController::class, 'show'])->name('demandes_recuperation.show');
// });



require __DIR__.'/auth.php';
