<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

use App\Models\User;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.employee');
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
        
        
        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);

        $empData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => $filename,
            'cin' => $request->cin,
            'phone' => $request->phone,
            'password' => Hash::make($request->CIN . 'idealpro')

        ];

        User::create($empData);
        return response()->json([
            'status' => 200
        ]);

    }

    //fetch all employees 
    public function fetchAll(){
        $emps = User::all();
        $output = '';
        if($emps->count() > 0){
            $output .= '<table class="table table-striped table-sm text-center align-middle">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Nom</th>
                                    <th>CIN</th>
                                    <th>Telephone</th>
                                    <th>Telephone</th>
                                    <th>post</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach($emps as $emp){
                                $output .='<tr>
                                            <td><img src="storage/images/'.$emp->avatar.'" width="50" 
                                                class="img-thumbnail rounded-circle"></td>
                                            <td>'.$emp->nom.' '.$emp->prenom.'</td>
                                            <td>'.$emp->cin.'</td>
                                            <td>'.$emp->phone.'</td>
                                            <td>'.$emp->email.'</td>
                                            <td>'.$emp->role.'</td>
                                            <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="#">
                                            </div>
                                            </td>
                                            <td>
                                                <a href="#" id="'.$emp->id.'" class="text-success mx-1 editIcon"
                                                 data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i> </a>
                                                <a href="#" id="'.$emp->id.'" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                            </td>
                                           </tr>';
                            }
                            $output .= '</tbody></table>';
                            echo $output;
        }else{
            echo '<h1 class="text-center text-secondary my-5"> Aucun employee enregestrer </h1>';
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
        $emp = User::find($id);
        return response()->json($emp);
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
        $filename='';
        $emp = User::find($request->id);
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            if($emp->avatar) {
                Storage::delete('public/images/' . $emp->avatar);
            }
        } else {
            $filename = $request->emp_avatar;
        }
        $empData = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => $filename,
            'cin' => $request->cin,
            'phone' => $request->phone,
            'password' => Hash::make($request->CIN . 'idealpro')
        ];  
        $emp->update($empData);
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
        $emp = User::find($id);
        if(Storage::delete('public/images/'.$emp->avatar)){
            User::destroy($id);
        }
    }
}
