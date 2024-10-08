<?php

namespace App\Http\Controllers\admin;

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
        return view('backend.pages.admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.admin.client.create');
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
        return redirect()->route('admin.client.index')->with('success', 'Client créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.pages.admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.pages.admin.client.edit', compact('client'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        // Validation des champs avec une règle d'unicité pour l'email qui ignore l'email actuel
        $request->validate([
            'company_name' => 'required|string|max:255',
            'legal_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id, // Ignore l'email du client actuel
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        // Mise à jour des données du client
        $client->update($request->all());

        return redirect()->route('admin.client.index')->with('success', 'Client mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete(); // Suppression du client
            return redirect()->route('admin.client.index')->with('success', 'Client supprimé avec succès.');
        } catch (\Exception $e) {
            // En cas d'erreur lors de la suppression
            return redirect()->route('admin.client.index')->with('error', 'Une erreur est survenue lors de la suppression du client.');
        }
    }
}
