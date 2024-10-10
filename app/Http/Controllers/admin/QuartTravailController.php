<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\QuartTravail;
use App\Models\Affectation;
use Illuminate\Http\Request;

class QuartTravailController extends Controller
{
    // Afficher la liste des quart de travail
    public function index()
    {
        $quartTravails = QuartTravail::with('affectation')->get();
        return view('backend.pages.admin.quarttravail.index', compact('quartTravails'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $affectations = Affectation::all();
        $quartTravails = QuartTravail::all();
        return view('backend.pages.admin.quarttravail.create', compact('quartTravails', 'affectations'));
    }

    // Enregistrer un nouveau quart de travail
    public function store(Request $request)
    {
        $request->validate([
            'affectation_id' => 'required|exists:affectations,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'work_hours' => 'nullable|integer',
        ]);

        QuartTravail::create($request->all());

        return redirect()->route('admin.quarttravail.index')->with('success', 'Quart de travail créé avec succès.');
    }

    // Afficher les détails d'un quart de travail
    public function show($id)
    {
        $quartTravails = QuartTravail::findOrFail($id);
        $affectations = Affectation::all();

        return view('backend.pages.admin.quarttravail.show', compact('quartTravails', 'affectations'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $quartTravails = QuartTravail::findOrFail($id);
        $affectations = Affectation::all();
        return view('backend.pages.admin.quarttravail.edit', compact('quartTravails', 'affectations'));
    }

    // Mettre à jour un quart de travail
    public function update(Request $request, $id)
    {
        $request->validate([
            'affectation_id' => 'required|exists:affectations,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'work_hours' => 'nullable|integer',
        ]);

        $quartTravails = QuartTravail::findOrFail($id);
        $quartTravails->update($request->all());

        return redirect()->route('admin.quarttravail.index')->with('success', 'Quart de travail mis à jour avec succès.');
    }

    // Supprimer un quart de travail
    public function destroy($id)
    {
        // Trouver le quart de travail par ID
        $quartTravails = QuartTravail::findOrFail($id);

        // Supprimer le quart de travail
        $deleted = $quartTravails->delete();

        if ($deleted) {
            return redirect()->route('admin.quarttravail.index')->with('success', 'Quart de travail supprimé avec succès.');
        } else {
            return redirect()->route('admin.quarttravail.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
