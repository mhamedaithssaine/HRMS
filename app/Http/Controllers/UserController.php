<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Emplois;
use App\Models\Contract;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     /**
     * Affiche la liste des utilisateurs.
     */

    public function index()
    {
        $users = User::with('roles', 'department','emplois','contract')->get();
        return view('users.index', compact('users'));
    }

     /**
     * Affiche le formulaire de création d'un utilisateur.
     */

    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        $emplois = Emplois::with('department')->get()->groupBy('department_id');
        $contracts = Contract::all();
        return view('users.create', compact('roles', 'departments','emplois','contracts'));
    }


     /**
     * Enregistre un nouvel utilisateur.
     */

    public function store(UserRequest $request)
    {
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'recrut_date' => $request->recrut_date,
            'salary' => $request->salary,
            'status' => $request->status,
            'department_id' => $request->department_id,
            'emplois_id' => $request->emplois_id,
            'contract_id' => $request->contract_id,
            'solde_conges' => round($this->calculerSoldeConges(new User($request->all())),0),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
     /**
     * Affiche les détails d'un utilisateur.
     */

    public function show(User $user)
    {
        $cursus = $user->cursus; 
        return view('users.show', compact('user','cursus'));
    }

    /**
     * Affiche le formulaire de modification d'un utilisateur.
     */

    public function edit(User $user)
    {
        $roles = Role::all();
        $departments = Department::all();
        $emplois = Emplois::with('department')->get()->groupBy('department_id');
        $contracts = Contract::all();
        $soldeConges = $this->calculerSoldeConges($user); 
        return view('users.edit', compact('user', 'roles', 'departments','emplois', 'contracts','soldeConges'));
    }

        /**
     * Met à jour les informations d'un utilisateur.
     */


    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'recrut_date' => $request->recrut_date,
            'salary' => $request->salary,
            'status' => $request->status,
            'department_id' => $request->department_id,
            'emplois_id' => $request->emplois_id,
            'contract_id' => $request->contract_id,
            'solde_conges' => $this->calculerSoldeConges($user),

        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Supprime un utilisateur.
     */


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Calcule le solde de congés d'un utilisateur.
     */

    public function calculerSoldeConges(User $user)
    {
        $dateDebut = $user->recrut_date;
        $maintenant = now();
    
        if (!$dateDebut) {
            return 0; 
        }
    
        $moisTravailles = $dateDebut->diffInMonths($maintenant);
        $anneesTravailles = $dateDebut->diffInYears($maintenant);
    
        if ($anneesTravailles < 1) {
            return $moisTravailles * 1.5;
        } else {
            return 18 + ($anneesTravailles - 1) * 0.5;
        }
    }

    
    /**
     * affiche le solde dans page solde .
     */

     public function details(User $user)
{
    $soldeConges = round($this->calculerSoldeConges($user),0); 
    return view('conges.solde', compact('user', 'soldeConges'));
}
}
