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
    public function index()
    {
        $users = User::with('roles', 'department','emplois','contract')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        $emplois = Emplois::with('department')->get()->groupBy('department_id');
        $contracts = Contract::all();
        return view('users.create', compact('roles', 'departments','emplois','contracts'));
    }

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
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $cursus = $user->cursus; 
        return view('users.show', compact('user','cursus'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $departments = Department::all();
        $emplois = Emplois::with('department')->get()->groupBy('department_id');
        $contracts = Contract::all();
        return view('users.edit', compact('user', 'roles', 'departments','emplois', 'contracts'));
    }

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
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
