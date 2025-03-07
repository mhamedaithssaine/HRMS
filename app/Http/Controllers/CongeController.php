<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestConge;
use App\Models\DemandeRecuperation;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DemandeCongeNotification;

class CongeController extends Controller
{


    public function index()
    {
        $conges = Conge::where('user_id', Auth::id())->get();
        return view('conges.index',compact('conges'));
    } 

    
    public function create()
    {
        return view('conges.create');
    }

    public function store(RequestConge $request)
    {

    //     $utilisateur = Auth::user();

    // // Calculer le solde de congés disponible
    // $soldeConges = $utilisateur->calculerSoldeConges();

    // // Vérifier si le solde est suffisant
    // $joursDemandes = $request->date_debut->diffInDays($request->date_fin) + 1;
    // if ($joursDemandes > $soldeConges) {
    //     return redirect()->back()->with('error', 'Solde de congés insuffisant.');
    // }

    
        $conge = Conge::create([
            'user_id' => Auth::id(), 
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'raison' => $request->raison,
            'statut' => 'en_attente', 
            'approbation_manager' => 'en_attente', 
            'approbation_rh' => 'en_attente', 
        ]);

        // $utilisateur->solde_conges -= $joursDemandes;
        // $utilisateur->save(); 


        $manager = User::role('manager')->first();
        $rh = User::role('rh')->first();

        // Si manager qui fait demande l'aprove de manager ça saire automatiqument approuve
        if (Auth::user()->hasRole('manager')) {
            $conge->update(['approbation_manager' => 'approuvé']);
        }

        if (Auth::user()->hasRole('manager')) {
            if ($rh) {
                $rh->notify(new DemandeCongeNotification($conge));
            }
        } else {
            
            if ($manager) {
                $manager->notify(new DemandeCongeNotification($conge));
            }
            if ($rh) {
                $rh->notify(new DemandeCongeNotification($conge));
            }
        }

        return redirect()->route('conges.index')->with('success', 'Demande de congé soumise avec succès.');
    }

    // affichage les demandes de conge pour le rh et manager
    public function gestion()
    {
        $conges = Conge::with(['user'])->where('statut','en_attente')->get();
        
        return view('conges.gestion', compact('conges'));
    }
    

     // Approuver ou rejeter une demande de conge par (manager)
     public function managerApprove(Request $request, Conge $conge)
     {
         $request->validate([
             'approbation_manager' => 'required|in:approuvé,rejeté',
         ]);
 
         $conge->update(['approbation_manager' => $request->approbation_manager]);
 
         return redirect()->route('conges.gestion')->with('success', 'Statut de la demande mis à jour.');
     }
      
         // Approuver ou rejeter une demande de conge par  (RH)
    public function rhApprove(Request $request, Conge $conge)
    {
        $request->validate([
            'approbation_rh' => 'required|in:approuvé,rejeté',
        ]);

        $conge->update(['approbation_rh' => $request->approbation_rh]);

        // update de status de demande de conge par raport RH et Manger 
        if ($conge->approbation_manager == 'approuvé' && $conge->approbation_rh == 'approuvé') {
            $conge->update(['statut' => 'approuvé']);
        } elseif ($conge->approbation_manager == 'rejeté' || $conge->approbation_rh == 'rejeté') {
            $conge->update(['statut' => 'rejeté']);
        }

        return redirect()->route('conges.gestion')->with('success', 'Statut de la demande mis à jour.');
    }


    

    

}