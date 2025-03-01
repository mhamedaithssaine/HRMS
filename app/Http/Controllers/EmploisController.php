<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmploisRequest;
use App\Models\Emplois;
use App\Models\Department;
use Illuminate\Http\Request;

class EmploisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = Emplois::with('department')->get();
        return view('emplois.index', compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
       
       
        return view('emplois.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmploisRequest $request)
    {
        Emplois::create($request->validated());
        return redirect()->route('emplois.index')->with('success','Emplooi ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emplois $emploi)
    {   
        return view('emplois.show',compact('emploi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplois $emploi)
    {
      $departements =Department::all(); 
      return  view('emplois.edit',compact('emploi','departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmploisRequest $request, Emplois $emploi)
    {
        $emploi->update($request->validated());
        return redirect()->route('emplois.index')->with('success','Emplois mes a joure avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplois $emploi)
    {
        $emploi->delete();
        return redirect()->route('emplois.index')->with('success','Emploi supprimer avec success');
    }
}
