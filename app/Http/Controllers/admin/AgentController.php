<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all(); // Récupérer tous les agents
        return view('backend.pages.admin.agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.admin.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        // Créer un nouveau agent
        $agents = new Agent();
        $agents->name = $request->name;
        $agents->email = $request->email;
        $agents->password = Hash::make($request->password);
        $saved = $agents->save();

        if ($saved) {
            // Générer un token de vérification
            $token = base64_encode(Str::random(64));

            // Stocker le token dans la table de vérification
            VerificationToken::create([
                'user_type' => 'agent',
                'email' => $request->email,
                'token' => $token
            ]);

            // Créer le lien de vérification
            $actionLink = route('agent.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['agent_name'] = $request->name;
            $data['agent_email'] = $request->email;

            // Envoyer l'email de vérification
            $mail_body = view('email-templates.agent-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Agent Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('agent.register-success');
            } else {
                return redirect()->route('agent.create')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('agent.create')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver le agent par ID
        $agents = Agent::findOrFail($id);
        return view('backend.pages.admin.agent.show', compact('agents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Trouver le agent par ID
        $agents = Agent::findOrFail($id);
        return view('backend.pages.admin.agent.edit', compact('agents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:agents,email,' . $id, // Ignorer l'email actuel
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:255',
        ]);

        // Trouver le agent par ID
        $agents = Agent::findOrFail($id);

        // Mettre à jour les données du agent
        $agents->name = $request->name;
        $agents->username = $request->username;
        $agents->email = $request->email;
        $agents->phone = $request->phone;
        $agents->address = $request->address;
        $agents->registration_number = $request->registration_number;

        // Enregistrer les modifications
        $saved = $agents->save();

        if ($saved) {
            return redirect()->route('admin.agent.index')->with('success', 'Agent mis à jour avec succès.');
        } else {
            return redirect()->route('admin.agent.edit', $id)->with('fail', 'Une erreur s\'est produite lors de la mise à jour.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Trouver le agent par ID
        $agents = Agent::findOrFail($id);

        // Supprimer le agent
        $deleted = $agents->delete();

        if ($deleted) {
            return redirect()->route('admin.agent.index')->with('success', 'Agent supprimé avec succès.');
        } else {
            return redirect()->route('admin.agent.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
