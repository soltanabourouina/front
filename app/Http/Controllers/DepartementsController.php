<?php

namespace App\Http\Controllers;

use App\departements;
use App\region;
use Illuminate\Http\Request;

class DepartementsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = region::all();
        $departements = departements::all();
        return view('departements.index', compact('regions','departements'));
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
        return departements::create($request->all());
        return view('departements.index', compact('departements'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function show(departements $departements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function edit(departements $departements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $id = region::where('nom', $request->nom)->first()->id;

       $departements = departements::findOrFail($request->id);

       $departements->update([
       'nom' => $request->nom,
       'region_id' => $id,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departements  $departements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $departements = departements::findOrFail($request->id);
         $departements->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



