<?php

namespace App\Http\Controllers;

use App\etablissements;
use App\departements;
use Illuminate\Http\Request;

class EtablissementsController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departements = departements::all();
        $etablissements = etablissements::orderBy('id','DESC')->paginate(5);
        return view('etablissements.index', compact('departements','etablissements'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
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
         etablissements::create($request->all());
      //  return view('etablissements.index', compact('etablissements'));
        
        session()->flash('Add', 'Ajouté avec succés');
        return redirect('/etablissements');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\etablissements  $etablissements
     * @return \Illuminate\Http\Response
     */
    public function show(etablissements $etablissements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\etablissements  $etablissements
     * @return \Illuminate\Http\Response
     */
    public function edit(etablissements $etablissements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\etablissements  $etablissements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $id = departements::where('nom', $request->dep_nom)->first()->id;

       $etablissements = etablissements::findOrFail($request->pro_id);

       $etablissements->update([
       'nom' => $request->etab_nom,
       'code' => $request->code,
       'departement_id' => $id,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\etablissements  $etablissements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $etablissements = etablissements::findOrFail($request->pro_id);
         $etablissements->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



