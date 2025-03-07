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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour la gestion 
Route::middleware('auth')->group(function () {
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index')->middleware('can:maange Conges');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create')->middleware('can:maange Conges');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store')->middleware('can:maange Conges');
    Route::get('/conges/gestion', [CongeController::class, 'gestion'])->name('conges.gestion')->middleware('can:maange Conges');
    Route::post('/conges/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('conges.managerApprove')->middleware('can:maange Conges');
    Route::post('/conges/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('conges.rhApprove')->middleware('can:maange Conges');
});

// Routes pour demande conges



// Routes pour les notifications 
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index')->middleware('can:notification');
});

// Routes pour la gestion des départements 
Route::middleware('auth')->group(function () {
    Route::resource('departments', DepartmentController::class)->middleware('can:maange Departments');
});

// Routes pour la gestion des emplois 
Route::middleware('auth')->group(function () {
    Route::resource('emplois', EmploisController::class)->middleware('can:maange Emplyois');
});

// Routes pour la gestion des contrats 
Route::middleware('auth')->group(function () {
    Route::resource('contracts', ContractController::class)->middleware('can:maange Emplyois');
});

// Routes pour la gestion des utilisateurs 
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->middleware('can:manage Emplyees');
});

// Routes pour la gestion des cursus 
Route::middleware('auth')->group(function () {
    Route::resource('cursus', CursusController::class)->middleware('can:manage Emplyees');
    Route::get('/cursus/create/{user}', [CursusController::class, 'create'])->name('cursus.create')->middleware('can:manage Emplyees');
    Route::post('/cursus', [CursusController::class, 'store'])->name('cursus.store')->middleware('can:manage Emplyees');
    Route::get('/cursus/{cursus}/edit', [CursusController::class, 'edit'])->name('cursus.edit')->middleware('can:manage Emplyees');
    Route::put('/cursus/{cursus}', [CursusController::class, 'update'])->name('cursus.update')->middleware('can:manage Emplyees');
    Route::get('/users/{user}', [CursusController::class, 'show'])->name('users.show')->middleware('can:manage Emplyees');
    Route::get('/emplois-by-department/{department_id}', [CursusController::class, 'getEmploisByDepartment'])->name('emplois.by.department')->middleware('can:manage Emplyees');
});

// Routes pour la hierarchie 
Route::middleware('auth')->group(function () {
    Route::get('/hierarchy', [HierarchyController::class, 'hierarchy'])->name('hierarchy.index')->middleware('can:maange Hierarchy');
});

// Routes pour les details de l'utilisateur 
Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde')->middleware('can:manage profile');
});

// Routes pour les demandes de recuperation
Route::middleware('auth')->group(function () {
    Route::resource('demandes_recuperation', DemandeRecuperationController::class)->except(['edit', 'update'])->middleware('can:maange Conges');
    Route::post('/demandes_recuperation/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('demandes_recuperation.updateStatut')->middleware('can:maange Conges');
    Route::get('/demandes_recuperation/{id}', [DemandeRecuperationController::class, 'show'])->name('demandes_recuperation.show')->middleware('can:maange Conges');
});

require __DIR__.'/auth.php';