<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batiment;

class BatimentControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Batiment');
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
            'gouvernant' => $request->gouvernant,
            'ville' => $request->ville,
            'adresse' => $request->adresse
        ];

        Batiment::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }

            //fetch all employees 
            public function fetchAll(){
                $Batiments = Batiment::all();
                $output = '';
                if($Batiments->count() > 0){
                    $output .= '<table class="table table-striped table-sm text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Gouvernant</th>
                                            <th>Ville</th>
                                            <th>Adresse </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    foreach($Batiments as $Batiment){
                                        $output .='<tr>
                                                    <td>'.$Batiment->gouvernant.'</td>
                                                    <td>'.$Batiment->ville.'</td>
                                                    <td>'.$Batiment->adresse.'</td>
                                                    <td>
                                                        <a href="#" id="'.$Batiment->id.'" class="text-success mx-1 editIcon"
                                                         data-bs-toggle="modal" data-bs-target="#editBatimentModal"><i class="bi-pencil-square h4"></i> </a>
                                                        <a href="#" id="'.$Batiment->id.'" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                                    </td>
                                                   </tr>';
                                    }
                                    $output .= '</tbody></table>';
                                    echo $output;
                }else{
                    echo '<h1 class="text-center text-secondary my-5"> Aucun Batiment Sauvgarder </h1>';
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
        $Batiments = Batiment::find($id);
        return response()->json($Batiments);
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
        $Batiments = Batiment::find($request->Batiment_id);
        $empData = [
            'gouvernant' => $request->gouvernant,
            'ville' => $request->ville,
            'adresse' => $request->adresse
        ];
        $Batiments->update($empData);
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
        $Batiment = Batiment::find($id);
        Batiment::destroy($id);
    }
}
