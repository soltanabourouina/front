<?php

namespace App\Http\Controllers;

use App\CodeRegroupementSecondaire;
use App\CodeRegroupementPrincipal;
use Illuminate\Http\Request;

class CodeRegroupementSecondaireController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $CodeRegroupementPrincipals = CodeRegroupementPrincipal::all();
        $CodeRegroupementSecondaires = CodeRegroupementSecondaire::orderBy('id','DESC')->paginate(5);
        return view('CodeRegroupementSecondaire.index', compact('CodeRegroupementPrincipals','CodeRegroupementSecondaires'))
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
         CodeRegroupementSecondaire::create($request->all());
      //  return view('CodeRegroupementSecondaire.index', compact('CodeRegroupementSecondaire'));
        
        session()->flash('Add', 'Ajouté avec succés');
        return redirect('/CodeRegroupementSecondaire');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\CodeRegroupementSecondaire  $CodeRegroupementSecondaire
     * @return \Illuminate\Http\Response
     */
    public function show(CodeRegroupementSecondaire $CodeRegroupementSecondaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CodeRegroupementSecondaire  $CodeRegroupementSecondaire
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeRegroupementSecondaire $CodeRegroupementSecondaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CodeRegroupementSecondaire  $CodeRegroupementSecondaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $id = CodeRegroupementPrincipal::where('nom', $request->dep_nom)->first()->id;

       $CodeRegroupementSecondaire = CodeRegroupementSecondaire::findOrFail($request->pro_id);

       $CodeRegroupementSecondaire->update([
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
     * @param  \App\CodeRegroupementSecondaire  $CodeRegroupementSecondaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $CodeRegroupementSecondaire = CodeRegroupementSecondaire::findOrFail($request->pro_id);
         $CodeRegroupementSecondaire->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



