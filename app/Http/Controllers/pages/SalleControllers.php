<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Batiment;

class SalleControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Salles= Salle::with('Batiment')->get();
        $Batiments= Batiment::with('Salles')->get();
        return view('pages.Salles', compact('Salles', 'Batiments'));
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
            'nom_salle' => $request->nom_salle,
            'numero_salle' => $request->numero_salle,
            'type_salle' => $request->type_salle,
            'batiment_id' => $request->batiment_id
        ];

        Salle::create($empData);
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
        $Salles= Salle::find($id);
        return response()->json($Salles);
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
        $Salles = Salle::findOrFail($request->id);

        $Salles->nom_salle = $request->nom_salle;
        $Salles->numero_salle = $request->numero_salle;
        $Salles->type_salle = $request->type_salle;
        $Salles->batiment_id = $request->batiment_id;

        $Salles->save();
        return redirect()->back()->with('succes', 'Salles a ete bien mise a jour ') ;
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
