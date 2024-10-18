<?php

namespace App\Http\Controllers\responsable;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Mission;
use App\Models\Poste;
use App\Models\Responsable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Récupérer les 6 dernières missions créées
        // et les afficher dans la page de dashboard.
        $missions = Mission::withCount('affectations')->orderBy('created_at', 'desc')->take(8)->get();
        $agents = Agent::count();

        $responsables = Responsable::count();
        $clients = Client::count();
        $postes = Poste::count();

        // Envoyer les données à la vue du dashboard
        return view('backend.pages.responsable.home', compact('missions', 'agents','responsables','clients','postes'));
    }

}
