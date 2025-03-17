<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\DemandeRecuperation;
use Illuminate\Support\Facades\Auth;

class DemandeRecuperationController extends Controller
{
    /**
     * Affiche la liste des demandes de récupération.
     */
    public function index()
    {
        if (Auth::user()->hasRole('rh')) {
            $demandes = DemandeRecuperation::with('user')->where('statut','en_attente')->get();
        } 
        else {
            $demandes = DemandeRecuperation::where('user_id', Auth::id())->get();
        }

        return view('demandes_recuperation.index', compact('demandes'));
    }

     /**
     * Affiche le formulaire de création d'une demande de récupération.
     */
    public function create()
    {
        return view('demandes_recuperation.create');
    }

     /**
     * Enregistre une nouvelle demande de récupération.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|before_or_equal:now',
            'heures_travaillees' => 'required|numeric|min:1',
        ], [
            'date.before_or_equal' => 'La date ne peut pas etre postérieure a aujourd\'hui.',
            'heures_travaillees.min' => 'Le nombre d\'heures travaillées doit être d\'au moins 1.',
        ]);

        DemandeRecuperation::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'heures_travaillees' => $request->heures_travaillees,
            'statut' => 'en_attente', 
        ]);

        return redirect()->route('demandes_recuperation.index')
            ->with('success', 'Demande de récupération soumise avec succès.');
    }

     /**
     * Affiche les détails d'une demande de recuperation.
     */
    public function show($id)
{
    $demande = DemandeRecuperation::find($id);

    if (!$demande) {
        return redirect()->route('demandes_recuperation.index')
            ->with('error', 'Demande de récupération non trouvée.');
    }

    return view('demandes_recuperation.show', compact('demande'));
}


    /**
     * Met à jour le statut d'une demande de recuperation (pour les RH).
     */
    public function updateStatut(Request $request, DemandeRecuperation $demande)
    {
        $request->validate([
            'statut' => 'required|in:approuvé,rejeté',
        ]);

        $demande->update(['statut' => $request->statut]);
        if ($request->statut == 'approuvé') {
            $user = $demande->user;
            $user->solde_recuperation += $demande->heures_travaillees;
            $user->save();
        }
        return redirect()->route('demandes_recuperation.index')
            ->with('success', 'Statut de la demande misse a jour.');
    }

}
