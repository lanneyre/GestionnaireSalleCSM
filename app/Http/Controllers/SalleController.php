<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("Salles.index", ["salles" => Salle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'numOfficiel' => 'required|unique:salles|max:255',
            'superficie' => 'required|integer',
            'nbMaxApprenants' => 'required|integer',
            'etage' => 'required|integer',
            'numArchi' => ''
        ]);
        $validated['numArchi'] = $validated['numOfficiel'];
        if (Salle::create($validated)) {
            return redirect()->back()->withSuccess('Insertion ok');
        }
        return redirect()->back()->withErrors('Echec insertion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        //
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'numOfficiel' => 'required|unique:salles|max:255',
            'superficie' => 'required|integer',
            'nbMaxApprenants' => 'required|integer',
            'etage' => 'required|integer'
        ]);

        foreach ($validated as $key => $value) {
            $salle->$key = $value;
        }
        if ($salle->save()) {
            return redirect()->back()->withSuccess('Edition ok');
        }
        return redirect()->back()->withErrors('Echec edition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salle $salle)
    {
        if ($salle->delete()) {
            return redirect()->back()->withSuccess('suppression ok');
        }
        return redirect()->back()->withErrors('Echec suppression');
    }
}
