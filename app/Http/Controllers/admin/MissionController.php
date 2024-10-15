<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Client;
use App\Models\Responsable;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Afficher la liste des missions
    public function index()
    {
        $missions = Mission::with('client', 'responsable')->get();
        $missions = Mission::withCount('affectations')->get();
        return view('backend.pages.admin.mission.index', compact('missions'));
    }

    // Afficher le formulaire de création d'une mission
    public function create()
    {
        $clients = Client::all();
        $responsables = Responsable::all();
        return view('backend.pages.admin.mission.create', compact('clients', 'responsables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Enregistrer une nouvelle mission
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'responsable_id' => 'required|exists:responsables,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,in progress,completed',
        ]);

        // Création de la mission
        Mission::create($request->all());

        return redirect()->route('admin.mission.index')->with('success', 'Mission créée avec succès.');
    }

    // Afficher les détails d'une mission
    public function show($id)
    {
        $missions = Mission::findOrFail($id);
        return view('backend.pages.admin.mission.show', compact('missions'));
    }

    // Afficher le formulaire de modification d'une mission
    public function edit($id)
    {
        $clients = Client::all();
        $responsables = Responsable::all();
        $missions = Mission::findOrFail($id);
        return view('backend.pages.admin.mission.edit', compact('missions', 'clients', 'responsables'));
    }


    // Mettre à jour une mission
    public function update(Request $request, $id)
    {

        $missions = Mission::findOrFail($id);

        // Validation des données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'responsable_id' => 'required|exists:responsables,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,in progress,completed',
        ]);

        // Mise à jour de la mission
        $missions->update($request->all());

        return redirect()->route('admin.mission.index')->with('success', 'Mission mise à jour avec succès.');
    }

    // Supprimer une mission
    public function destroy($id)
    {
        // Trouver la mission par ID
        $missions = Mission::findOrFail($id);

        // Supprimer la mission
        $deleted = $missions->delete();

        if ($deleted) {
            return redirect()->route('admin.mission.index')->with('success', 'Mission supprimé avec succès.');
        } else {
            return redirect()->route('admin.mission.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
