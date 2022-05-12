<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payement;
use App\Models\Etudiant;

class PayementControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Payements= Payement::with('Etudiant')->get();
        $Etudiants= Etudiant::with('Payement')->get();
        return view('pages.Payement', compact('Payements', 'Etudiants'));
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
            'type_payement' => $request->type_payement,
            'num_tranche' => $request->num_tranche,
            'montant' => $request->montant,
            'etudiant_id' => $request->etudiant_id
        ];

        Payement::create($empData);
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
        $Payement= Payement::find($id);
        return response()->json($Payement);
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
        $Payements = Payement::findOrFail($request->id);

        $Payements->type_payement = $request->type_payement;
        $Payements->num_tranche = $request->num_tranche;
        $Payements->montant = $request->montant;
        $Payements->etudiant_id = $request->etudiant_id;

        $Payements->save();
        return redirect()->back()->with('succes', 'Payement a ete bien mise a jour ') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
