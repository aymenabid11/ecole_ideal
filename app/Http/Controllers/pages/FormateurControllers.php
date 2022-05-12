<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formateur;
use App\Models\Formation;

class FormateurControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Formateurs= Formateur::with('Formation')->get();
        $Formations= Formation::with('Formateurs')->get();
        return view('pages.Formateur', compact('Formateurs', 'Formations'));
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
        $Formateurs= new Formateur();

        $Formateurs->CIN = $request->CIN;
        $Formateurs->nom = $request->nom;
        $Formateurs->prenom = $request->prenom;
        $Formateurs->Diplome = $request->Diplome;
        $Formateurs->numero_telephone = $request->numero_telephone;
        $Formateurs->date_naissance = $request->date_naissance;
        $Formateurs->adresse = $request->adresse;
        $Formateurs->ville = $request->ville;
        $Formateurs->code_postale = $request->code_postale;
        $Formateurs->formation_id = $request->formation_id;

        $Formateurs->save();

        return redirect()->back()->with('succes', 'Formateur a ete bien mise a jour ') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Formateurs= Formateur::find($id);
        return response()->json($Formateurs);
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
        $Formateurs = Formateur::findOrFail($request->id);

        $Formateurs->CIN = $request->CIN;
        $Formateurs->nom = $request->nom;
        $Formateurs->prenom = $request->prenom;
        $Formateurs->Diplome = $request->Diplome;
        $Formateurs->numero_telephone = $request->numero_telephone;
        $Formateurs->date_naissance = $request->date_naissance;
        $Formateurs->adresse = $request->adresse;
        $Formateurs->ville = $request->ville;
        $Formateurs->code_postale = $request->code_postale;
        $Formateurs->formation_id = $request->formation_id;

        $Formateurs->save();

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
        Formateur::destroy($id);
        return redirect()->back()->with('succes', 'l\'etudiant a ete bien supprimer ') ;
    }
}
