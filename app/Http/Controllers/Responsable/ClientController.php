<?php

namespace App\Http\Controllers\Responsable;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all(); // Récupérer tous les responsables
        return view('backend.pages.responsable.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.responsable.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'legal_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        // Création du client
        Client::create($validated);

        // Redirection avec message de succès
        return redirect()->route('responsable.client.index')->with('success', 'Client créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clients = Client::findOrFail($id);
        return view('backend.pages.responsable.client.show', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        return view('backend.pages.responsable.client.edit', compact('clients'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clients = Client::findOrFail($id);

        // Validation des champs avec une règle d'unicité pour l'email qui ignore l'email actuel
        $request->validate([
            'company_name' => 'required|string|max:255',
            'legal_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $clients->id, // Ignore l'email du client actuel
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        // Mise à jour des données du client
        $clients->update($request->all());

        return redirect()->route('responsable.client.index')->with('success', 'Client mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver le client par ID
        $clients = Client::findOrFail($id);

        // Supprimer le client
        $deleted = $clients->delete();

        if ($deleted) {
            return redirect()->route('responsable.client.index')->with('success', 'Client supprimé avec succès.');
        } else {
            return redirect()->route('responsable.client.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
