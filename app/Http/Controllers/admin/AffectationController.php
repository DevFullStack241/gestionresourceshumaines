<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Affectation;
use App\Models\Mission;
use App\Models\Agent;
use App\Models\Poste;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    // Affiche la liste des affectations
    public function index()
    {
        $affectations = Affectation::with('mission', 'agent', 'poste')->get();
        return view('backend.pages.admin.affectation.index', compact('affectations'));
    }

    // Retourne la vue de création d'une nouvelle affectation
    public function create()
    {
        $missions = Mission::all();
        $agents = Agent::all();
        $postes = Poste::all();
        return view('backend.pages.admin.affectation.create', compact('missions', 'agents', 'postes'));
    }

    // Enregistre une nouvelle affectation
    public function store(Request $request)
    {
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'agent_id' => 'required|exists:agents,id',
            'poste_id' => 'required|exists:postes,id',
            'assignment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Affectation::create($request->all());

        return redirect()->route('admin.affectation.index')->with('success', 'Affectation créée avec succès.');
    }

    // Affiche une affectation spécifique
    public function show($id)
    {
        $affectations = Affectation::findOrFail($id);
        return view('backend.pages.admin.affectation.show', compact('affectations'));
    }

    // Retourne la vue pour l'édition d'une affectation
    public function edit($id)
    {
        $missions = Mission::all();
        $agents = Agent::all();
        $postes = Poste::all();
        $affectations = Affectation::findOrFail($id);
        return view('backend.pages.admin.affectation.edit', compact('affectations', 'missions', 'agents', 'postes'));
    }

    // Met à jour une affectation
    public function update(Request $request, $id)
    {

        $affectations = Affectation::findOrFail($id);

        // Validation des données du formulaire
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'agent_id' => 'required|exists:agents,id',
            'poste_id' => 'required|exists:postes,id',
            'assignment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $affectations->update($request->all());

        return redirect()->route('admin.affectation.index')->with('success', 'Affectation mise à jour avec succès.');
    }

    // Supprime une affectation
    public function destroy($id)
    {
        // Trouver l'affectation par ID
        $affectations = Affectation::findOrFail($id);

        // Supprimer l'affectation
        $deleted = $affectations->delete();

        if ($deleted) {
            return redirect()->route('admin.affectation.index')->with('success', 'Affectation supprimé avec succès.');
        } else {
            return redirect()->route('admin.affectation.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
