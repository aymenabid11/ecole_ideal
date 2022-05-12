<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Matiere;


class MatiereControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Matieres= Matiere::with('Formation')->get();
        $Formations= Formation::with('Matieres')->get();
        return view('pages.Matieres', compact('Matieres', 'Formations'));
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
        $empData = [
            'nom_matiere' => $request->nom_matiere,
            'coef' => $request->coef,
            'formation_id' => $request->formation_id
        ];

        Matiere::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Matieres= Matiere::find($id);
        return response()->json($Matieres);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Matieres = Matiere::findOrFail($request->id);

        $Matieres->nom_matiere = $request->nom_matiere;
        $Matieres->coef = $request->coef;
        $Matieres->formation_id = $request->formation_id;

        $Matieres->save();
        return redirect()->back()->with('succes', 'Matieres a ete bien mise a jour ') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::destroy($id);
        return redirect()->back()->with('succes', 'Matiere a ete bien supprimer ') ;
    }
}
