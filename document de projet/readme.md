Copier
# RHMS (Resource Human Management System)

## Table des Matières

- [Introduction](#introduction)
- [Installation](#installation)
- [Routes](#routes)
  - [Routes de Base](#routes-de-base)
  - [Routes de Profil](#routes-de-profil)
  - [Routes de Gestion des Congés](#routes-de-gestion-des-congés)
  - [Routes de Gestion des Départements, Emplois, Contrats, Utilisateurs, et Cursus](#routes-de-gestion-des-départements-emplois-contrats-utilisateurs-et-cursus)
  - [Routes pour les Détails des Utilisateurs](#routes-pour-les-détails-des-utilisateurs)
  - [Routes pour les Demandes de Récupération](#routes-pour-les-demandes-de-récupération)
- [Seeders](#seeders)
  - [RoleSeeder](#roleseeder)
- [Conclusion](#conclusion)

## Introduction

Ce document décrit les routes et les seeders utilisés dans le projet RHMS (Resource Human Management System). Le projet utilise Laravel avec le package Breeze pour l'authentification, Tailwind CSS pour le style, et Spatie pour la gestion des rôles et des permissions.

## Installation

Pour installer le projet, suivez ces étapes :

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/mhamedaithssaine/HRMS
   cd rhms
Installez les dépendances :


composer install
npm install
Configurez votre environnement :

Copier
cp .env.example .env
php artisan key\:generate
Exécutez les migrations et les seeders :

Copier
php artisan migrate --seed
Lancez le serveur de développement :

Copier
php artisan serve
Routes
Les routes sont définies dans le fichier routes/web.php. Voici une description détaillée de chaque groupe de routes :

Routes de Base
Copier
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/ : Affiche la page d'accueil.
/dashboard : Affiche le tableau de bord de l'utilisateur authentifié.
Routes de Profil
Copier
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/profile : Affiche et permet de modifier le profil de l'utilisateur authentifié.
Routes de Gestion des Congés
Copier
Route::middleware('auth')->group(function () {
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
    Route::get('/conges/gestion', [CongeController::class, 'gestion'])->name('conges.gestion');
    Route::post('/conges/{conge}/manager-approve', [CongeController::class, 'managerApprove'])->name('conges.managerApprove');
    Route::post('/conges/{conge}/rh-approve', [CongeController::class, 'rhApprove'])->name('conges.rhApprove');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
/conges : Affiche la liste des congés.
/conges/create : Affiche le formulaire de création de congé.
/conges (POST) : Soumet un nouveau congé.
/conges/gestion : Affiche la page de gestion des congés.
/conges/{conge}/manager-approve : Approuve un congé par le manager.
/conges/{conge}/rh-approve : Approuve un congé par le RH.
/notifications : Affiche les notifications.
Routes de Gestion des Départements, Emplois, Contrats, Utilisateurs, et Cursus
Copier
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
});
/departments : Ressource pour la gestion des départements.
/emplois : Ressource pour la gestion des emplois.
/contracts : Ressource pour la gestion des contrats.
/users : Ressource pour la gestion des utilisateurs.
/cursus : Ressource pour la gestion des cursus.
/cursus/create/{user} : Affiche le formulaire de création de cursus pour un utilisateur.
/cursus/{cursus}/edit : Affiche le formulaire d'édition de cursus.
/users/{user} : Affiche les détails d'un utilisateur.
/emplois-by-department/{department_id} : Récupère les emplois par département.
/hierarchy : Affiche la hiérarchie.
Routes pour les Détails des Utilisateurs
Copier
Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/details', [UserController::class, 'details'])->name('conges.solde');
});
/users/{user}/details : Affiche les détails d'un utilisateur.
Routes pour les Demandes de Récupération
Copier
Route::resource('demandes_recuperation', DemandeRecuperationController::class)->except(['edit', 'update']);
Route::post('/demandes_recuperation/{demande}/statut', [DemandeRecuperationController::class, 'updateStatut'])->name('demandes_recuperation.updateStatut');
Route::get('/demandes_recuperation/{id}', [DemandeRecuperationController::class, 'show'])->name('demandes_recuperation.show');
/demandes_recuperation : Ressource pour la gestion des demandes de récupération.
/demandes_recuperation/{demande}/statut : Met à jour le statut d'une demande de récupération.
/demandes_recuperation/{id} : Affiche les détails d'une demande de récupération.
Seeders
Les seeders sont utilisés pour initialiser la base de données avec des rôles et des permissions. Voici une description détaillée du seeder RoleSeeder :

RoleSeeder
Copier
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        \$roles = [
            'admin' => [
                'manage Employees',
                'manage Employments',
                'manage Departments',
                'manage Hierarchy',
                'manage Conges',
                'notification',
                'manage profile',
            ],
            'rh' => [
                'manage Employees',
                'manage Employments',
                'manage Hierarchy',
                'manage Conges',
                'notification',
                'manage profile',
                'manage recuperation',
                'demande recuperation',
            ],
            'manager' => [
                'manage Hierarchy',
                'manage Conges',
                'notification',
                'manage profile',
                'demande conges',
                'demande recuperation',
            ],
            'employee' => [
                'manage Hierarchy',
                'manage profile',
                'demande conges',
                'demande recuperation',
            ],
        ];

        foreach (\$roles as \$roleName => \$permissions) {
            \$role = Role::firstOrCreate(['name' => \$roleName]);
            foreach (\$permissions as \$permissionName) {
                \$permission = Permission::firstOrCreate(['name' => \$permissionName]);
                \$role->givePermissionTo(\$permission);
            }
        }
    }
}
Rôles et Permissions :
admin : Accès complet à toutes les fonctionnalités.
rh : Accès aux fonctionnalités liées aux employés, emplois, hiérarchie, congés, notifications, et demandes de récupération.
manager : Accès aux fonctionnalités liées à la hiérarchie, congés, notifications, et demandes de congés et de récupération.
employee : Accès aux fonctionnalités liées à la hiérarchie, profil, et demandes de congés et de récupération.
Conclusion
Ce document décrit les routes et les seeders utilisés dans le projet RHMS. Les routes sont organisées en groupes pour faciliter la gestion des différentes fonctionnalités, et les seeders sont utilisés pour initialiser les rôles et les permissions dans la base de données. Si vous avez des questions ou besoin de plus d'informations, n'hésitez pas à demander !