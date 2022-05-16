<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setAffichage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->missing('affichage')) {
            session(['affichage' => 'groupe']);
        }
        if ($request->session()->missing('triGroupe')) {
            session(['triGroupe' => 'nom']);
        }
        if ($request->session()->missing('triSalle')) {
            session(['triSalle' => 'numOfficiel']);
        }
        return $next($request);
    }
}
