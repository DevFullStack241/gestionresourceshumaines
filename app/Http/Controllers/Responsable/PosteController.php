<?php

namespace App\Http\Controllers\Responsable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poste;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $postes = Poste::all(); // Récupérer tous les responsables
        return view('backend.pages.responsable.poste.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.responsable.poste.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'position_name' => 'required|string|max:255',
            'hourly_quota' => 'required|integer',
            'required_skills' => 'nullable|string',
            'additional_information' => 'nullable|string',
        ]);

        // Création du poste
        Poste::create($validated);

        // Redirection avec message de succès
        return redirect()->route('responsable.poste.index')->with('success', 'Poste créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postes = Poste::findOrFail($id);
        return view('backend.pages.responsable.poste.show', compact('postes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $postes = Poste::findOrFail($id);
        return view('backend.pages.responsable.poste.edit', compact('postes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $postes = Poste::findOrFail($id);

        // Validation des champs avec une règle d'unicité pour l'email qui ignore l'email actuel
        $request->validate([
            'position_name' => 'required|string|max:255',
            'hourly_quota' => 'required|integer',
            'required_skills' => 'nullable|string',
            'additional_information' => 'nullable|string',
        ]);

        // Mise à jour des données du poste
        $postes->update($request->all());

        return redirect()->route('responsable.poste.index')->with('success', 'Poste mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver le poste par ID
        $postes = Poste::findOrFail($id);

        // Supprimer le poste
        $deleted = $postes->delete();

        if ($deleted) {
            return redirect()->route('responsable.poste.index')->with('success', 'Poste supprimé avec succès.');
        } else {
            return redirect()->route('responsable.poste.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
