<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;

class FormationControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Formation');
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
            'nom_formation' => $request->nom_formation,
            'frais_inscription' => $request->frais_inscription,
            'frais_formation' => $request->frais_formation,
            'frais_examan_final' => $request->frais_examan_final,
            'duree_formation' => $request->duree_formation
        ];

        Formation::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }

        //fetch all employees 
        public function fetchAll(){
            $Formations = Formation::all();
            $output = '';
            if($Formations->count() > 0){
                $output .= '<table class="table table-striped table-sm text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Formation</th>
                                        <th>Frais Inscription</th>
                                        <th>Frais </th>
                                        <th>Frais Examen</th>
                                        <th>Duree</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach($Formations as $Formation){
                                    $output .='<tr>
                                                <td>'.$Formation->nom_formation.'</td>
                                                <td>'.$Formation->frais_inscription.'</td>
                                                <td>'.$Formation->frais_formation.'</td>
                                                <td>'.$Formation->frais_examan_final.'</td>
                                                <td>'.$Formation->duree_formation.' Mois'.'</td>
                                                <td>
                                                    <a href="#" id="'.$Formation->id.'" class="text-success mx-1 editIcon"
                                                     data-bs-toggle="modal" data-bs-target="#editFormationModal"><i class="bi-pencil-square h4"></i> </a>
                                                    <a href="#" id="'.$Formation->id.'" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                                </td>
                                               </tr>';
                                }
                                $output .= '</tbody></table>';
                                echo $output;
            }else{
                echo '<h1 class="text-center text-secondary my-5"> Aucun Formation Sauvgarder </h1>';
            }
    
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $Formation = Formation::find($id);
        return response()->json($Formation);
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
        $Formation = Formation::find($request->Formation_id);
        $empData = [
            'nom_formation' => $request->nom_formation,
            'frais_inscription' => $request->frais_inscription,
            'frais_formation' => $request->frais_formation,
            'frais_examan_final' => $request->frais_examan_final,
            'duree_formation' => $request->duree_formation
        ];  
        $Formation->update($empData);
        return response()->json([
            'status' => 200
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $Formation = Formation::find($id);
        Formation::destroy($id);
    }
}
