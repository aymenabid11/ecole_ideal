<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Description_Formation;

class Description_FormationControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Detailles= Description_Formation::with('Formation')->get();
        $Formations= Formation::with('Description_Formations')->get();
        return view('pages.Description_formation', compact('Detailles', 'Formations'));
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
        $Detailles= new Description_Formation();

        $Detailles->formation_id = $request->formation_id;
        $Detailles->Text_slider = $request->Text_slider;
        $Detailles->description = $request->description;
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $Detailles->avatar = $filename;
        }

        $Detailles->save();

        return redirect()->back()->with('succes', 'Deatailles a ete bien mise a jour ') ;
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
    public function update(Request $request, $id)
    {
        //
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
