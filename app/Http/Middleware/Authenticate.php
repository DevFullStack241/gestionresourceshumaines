<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                session()->flash('fail', 'Vous devez d\'abord vous connecter');
                return route('admin.login');
            }

            if ($request->routeIs('responsable.*')) {
                session()->flash('fail', 'Vous devez d\'abord vous connecter');
                return route('responsable.login');
            }

            if ($request->routeIs('agent.*')) {
                session()->flash('fail', 'Vous devez d\'abord vous connecter');
                return route('agent.login');
            }

            // Retour par défaut pour les autres utilisateurs
            return route('login'); // Assure-toi d'avoir une route de connexion par défaut
        }
        // Si la requête attend une réponse JSON, retourne null
        return null;
    }
}
