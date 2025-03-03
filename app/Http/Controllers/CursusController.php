<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cursus;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CursusController extends Controller
{
    public function create(User $user)
    {
        $contracts = Contract::all();
        $grades = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
        return view('cursus.create', compact('user','contracts','grades'));
    }


    public function store(Request $request, User $user)
    {
        $request->validate([
            'grade' => 'required',
            'date' => 'required|date',
            'campus' => 'required',
            'contrat' => 'required|exists:contracts,id',
            'formation' => 'required',
            'position' => 'required',
            'remarques' => 'nullable',
        ]);

        $cursus = new Cursus($request->all());
        $user->cursus()->save($cursus);

        return redirect()->route('users.show', $user->id);
    }

    public function edit(Cursus $cursu)
    {
        $contracts = Contract::all();
        $grades = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
        return view('cursus.edit', compact('cursu','contracts', 'grades'));
    }


    public function update(Request $request, Cursus $cursu)
    {
        $request->validate([
            'grade' => 'required',
            'date' => 'required|date',
            'campus' => 'required',
            'contrat' => 'required|exists:contracts,id',
            'formation' => 'required',
            'position' => 'required',
            'remarques' => 'nullable',
        ]);

        $cursu->update($request->all());

        return redirect()->route('users.show', $cursu->user_id);
    }

    public function show(User $user)
    {
        $cursus = $user->cursus; 
        return view('users.show', compact('user', 'cursus'));
    }
}
