<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cursus;
use App\Models\Emplois;
use App\Models\Contract;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CursusController extends Controller
{
    public function create(User $user)
    {

        $emplois =  $emplois = Emplois::all();
    
        $contracts = Contract::all();
        $departments = Department::all();
        $grades = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
    
        return view('cursus.create', compact('user', 'departments', 'emplois', 'contracts', 'grades'));
    }

    public function store(Request $request)
    {    
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
            'emplois_id' => 'nullable|exists:emplois,id',
            'contract_id' => 'nullable|exists:contracts,id',
            'grade' => 'required|string',
            'campus' => 'required|string',
            'formation' => 'required|string',
            'remarques' => 'nullable|string',
        ]);
        // dd($request->all());
    
        $cursus = Cursus::create($validated);

    
        return redirect()->route('users.show',['user' => $cursus->user_id])->with('success', 'Cursus ajouté avec succès');
    }

    public function edit($id)
    {
        $cursus = Cursus::find($id);

        if (!$cursus) {
            return redirect()->route('users.show')->with('error', 'Cursus introuvable.');
        }

        $departments = Department::all();
        $emplois = Emplois::all();
        $contracts = Contract::all();
        $grades = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];

        return view('cursus.edit', compact('cursus', 'departments', 'emplois', 'contracts', 'grades'));  
    }

    public function update(Request $request, Cursus $cursus)
    { 
        $validated = $request->validate([

            'grade' => 'required|string',
            'campus' => 'required|string',
            'formation' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'emplois_id' => 'required|exists:emplois,id',
            'contract_id' => 'required|exists:contracts,id',
            'remarques' => 'nullable|string',
        ]);
    
        $cursus->update($validated);
        return redirect()->route('users.show', $cursus->id)->with('success', 'Cursus mis à jour avec succès');        }



    public function show(User $user)
    {
        $cursus = $user->cursus()->with(['department', 'emplois', 'contract'])->get();
       


        return view('users.show', compact('user', 'cursus',));
    }

     
    public function getEmploisByDepartment($department_id)
    {
        $emplois = Emplois::where('department_id', $department_id)->get();
        return response()->json($emplois);
    }


}
