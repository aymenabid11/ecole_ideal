<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parent_Etudiant;
use App\Models\Etudiant;


class Parents_etudiantControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Parents= Parent_Etudiant::with('Etudiant')->get();
        $Etudiants= Etudiant::with('Parent_Etudiant')->get();
        return view('pages.Parents_etudiant', compact('Parents', 'Etudiants'));
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
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero_telephone' => $request->numero_telephone,
            'etudiant_id' => $request->etudiant_id
        ];

        Parent_Etudiant::create($empData);
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
        $parents= Parent_Etudiant::find($id);
        return response()->json($parents);
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
        $parents = Parent_Etudiant::findOrFail($request->id);

        $parents->nom = $request->nom;
        $parents->prenom = $request->prenom;
        $parents->numero_telephone = $request->numero_telephone;
        $parents->etudiant_id = $request->etudiant_id;

        $parents->save();
        return redirect()->back()->with('succes', 'l\'etudiant a ete bien mise a jour ') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parent_Etudiant::destroy($id);
        return redirect()->back()->with('succes', 'l\'etudiant a ete bien supprimer ') ;
    }
}
