<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("Groupes.index", ["groupes" => Groupe::all()]);
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
            'nom' => 'required|unique:groupes|max:255',
            'effectif' => 'required|max:255',
        ]);
        if (Groupe::create($validated)) {
            return redirect()->back()->withSuccess('Insertion ok');
        }
        return redirect()->back()->withErrors('Echec insertion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Groupe $groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupe $groupe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupe $groupe)
    {
        //
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'effectif' => 'required|max:255',
        ]);

        foreach ($validated as $key => $value) {
            $groupe->$key = $value;
        }
        if ($groupe->save()) {
            return redirect()->back()->withSuccess('Edition ok');
        }
        return redirect()->back()->withErrors('Echec edition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupe $groupe)
    {
        if ($groupe->delete()) {
            return redirect()->back()->withSuccess('suppression ok');
        }
        return redirect()->back()->withErrors('Echec suppression');
    }
}
