<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Disponibilite;
use Illuminate\Http\Request;

class DisponibiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Affiche toutes les disponibilités
    public function index()
    {
        $disponibilites = Disponibilite::with('agent')->get(); // Récupère les disponibilités avec les informations des agents
        return view('backend.pages.admin.disponibilite.index', compact('disponibilites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Affiche le formulaire de création d'une disponibilité
    public function create()
    {
        $agents = Agent::all(); // Récupère tous les agents pour le formulaire
        return view('backend.pages.admin.disponibilite.create', compact('agents'));
    }

    // Enregistrer un nouveau quart de travail
    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:available,unavailable',
        ]);

        Disponibilite::create($request->all());

        return redirect()->route('admin.disponibilite.index')->with('success', 'Disponibilité ajoutée avec succès.');
    }

    // Afficher les détails d'un quart de travail
    // Affiche une disponibilité spécifique
    public function show($id)
    {
        $disponibilites = Disponibilite::with('agent')->findOrFail($id);
        return view('backend.pages.admin.disponibilite.show', compact('disponibilites'));
    }

    // Affiche le formulaire d'édition d'une disponibilité
    public function edit($id)
    {
        $disponibilites = Disponibilite::findOrFail($id);
        $agents = Agent::all(); // Récupère tous les agents pour l'édition
        return view('backend.pages.admin.disponibilite.edit', compact('disponibilites', 'agents'));
    }

    // Mettre à jour un quart de travail
    public function update(Request $request, $id)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:available,unavailable',
        ]);

        $disponibilites = Disponibilite::findOrFail($id);
        $disponibilites->update($request->all());

        return redirect()->route('admin.disponibilite.index')->with('success', 'Disponibilité mise à jour avec succès.');
    }

    // Supprimer une disponibilité
    public function destroy($id)
    {
        // Trouver la disponibilité par ID
        $disponibilites = Disponibilite::findOrFail($id);

        // Supprimer le quart de travail
        $deleted = $disponibilites->delete();

        if ($deleted) {
            return redirect()->route('admin.disponibilite.index')->with('success', 'Disponibilité supprimé avec succès.');
        } else {
            return redirect()->route('admin.disponibilite.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
