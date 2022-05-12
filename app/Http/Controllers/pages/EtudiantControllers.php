<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parent_Etudiant;
use App\Models\Formation;
use App\Models\Batiment;
use App\Models\Etudiant;

class EtudiantControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Etudiants= Etudiant::with('Formation','Batiment','Parent_Etudiant')->get();
        $Formations= Formation::with('Etudiants')->get();
        $Batiments= Batiment::with('Etudiants')->get();
        $Parents= Parent_Etudiant::with('Etudiant')->get();
        return view('pages.Etudiant', compact('Formations', 'Batiments', 'Etudiants', 'Parents'));
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
        $randomNumber = random_int(100000, 999999);

        $Etudiant = new Etudiant();
        $Etudiant->nom = $request->nom;
        $Etudiant->code = $randomNumber;
        $Etudiant->nom = $request->nom;
        $Etudiant->prenom = $request->prenom;
        $Etudiant->date_naissance = $request->date_naissance;
        $Etudiant->niveau_scolaire = $request->niveau_scolaire;
        $Etudiant->numero_telephone = $request->numero_telephone;
        $Etudiant->adresse = $request->adresse;
        $Etudiant->ville = $request->ville;
        $Etudiant->code_postale = $request->code_postale;
        $Etudiant->formation_id = $request->formation_id;
        $Etudiant->batiment_id = $request->batiment_id;

        $Etudiant->save();
        return redirect()->back()->with('succes', 'l\'etudiant a ete bien mise a jour ') ;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant= Etudiant::find($id);
        return response()->json($etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
        $Etudiant = Etudiant::findOrFail($request->id);

        $Etudiant->nom = $request->nom;
        $Etudiant->nom = $request->nom;
        $Etudiant->prenom = $request->prenom;
        $Etudiant->date_naissance = $request->date_naissance;
        $Etudiant->niveau_scolaire = $request->niveau_scolaire;
        $Etudiant->numero_telephone = $request->numero_telephone;
        $Etudiant->adresse = $request->adresse;
        $Etudiant->ville = $request->ville;
        $Etudiant->code_postale = $request->code_postale;
        $Etudiant->formation_id = $request->formation_id;
        $Etudiant->batiment_id = $request->batiment_id;

        $Etudiant->save();
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
        Etudiant::destroy($id);
        return redirect()->back()->with('succes', 'l\'etudiant a ete bien supprimer ') ;

    }
}
