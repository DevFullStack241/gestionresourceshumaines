<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsables = Responsable::all(); // Récupérer tous les responsables
        return view('backend.pages.admin.responsable.index', compact('responsables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.admin.responsable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:responsables',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        // Créer un nouveau responsable
        $responsables = new Responsable();
        $responsables->name = $request->name;
        $responsables->email = $request->email;
        $responsables->password = Hash::make($request->password);
        $saved = $responsables->save();

        if ($saved) {
            // Générer un token de vérification
            $token = base64_encode(Str::random(64));

            // Stocker le token dans la table de vérification
            VerificationToken::create([
                'user_type' => 'responsable',
                'email' => $request->email,
                'token' => $token
            ]);

            // Créer le lien de vérification
            $actionLink = route('responsable.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['responsable_name'] = $request->name;
            $data['responsable_email'] = $request->email;

            // Envoyer l'email de vérification
            $mail_body = view('email-templates.responsable-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Responsable Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('responsable.register-success');
            } else {
                return redirect()->route('responsable.create')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('responsable.create')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver le responsable par ID
        $responsables = Responsable::findOrFail($id);
        return view('backend.pages.admin.responsable.show', compact('responsables'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Trouver le responsable par ID
        $responsables = Responsable::findOrFail($id);
        return view('backend.pages.admin.responsable.edit', compact('responsables'));
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
            'email' => 'required|email|unique:responsables,email,' . $id, // Ignorer l'email actuel
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Trouver le responsable par ID
        $responsables = Responsable::findOrFail($id);

        // Mettre à jour les données du responsable
        $responsables->name = $request->name;
        $responsables->username = $request->username;
        $responsables->email = $request->email;
        $responsables->phone = $request->phone;
        $responsables->address = $request->address;

        // Enregistrer les modifications
        $saved = $responsables->save();

        if ($saved) {
            return redirect()->route('admin.responsable.index')->with('success', 'Responsable mis à jour avec succès.');
        } else {
            return redirect()->route('admin.responsable.edit', $id)->with('fail', 'Une erreur s\'est produite lors de la mise à jour.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Trouver le responsable par ID
        $responsables = Responsable::findOrFail($id);

        // Supprimer le responsable
        $deleted = $responsables->delete();

        if ($deleted) {
            return redirect()->route('admin.responsable.index')->with('success', 'Responsable supprimé avec succès.');
        } else {
            return redirect()->route('admin.responsable.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
