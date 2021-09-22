<?php

namespace App\Http\Controllers;
use App\filieres_metiers;
use App\categories_professionnel;

use Illuminate\Http\Request;

class Filieres_MetierController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories_professionnels = categories_professionnel::all();
        $filieres_metiers = filieres_metiers::orderBy('id','DESC')->paginate(5);
        return view('filieres_metiers.index', compact('categories_professionnels','filieres_metiers'))
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
         filieres_metiers::create($request->all());
      //  return view('filieres_metiers.index', compact('filieres_metiers'));
        
        session()->flash('Add', 'Ajouté avec succés');
        return redirect('/filieres_metiers');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\filieres_metiers  $filieres_metiers
     * @return \Illuminate\Http\Response
     */
    public function show(filieres_metiers $filieres_metiers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\filieres_metiers  $filieres_metiers
     * @return \Illuminate\Http\Response
     */
    public function edit(filieres_metiers $filieres_metiers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\filieres_metiers  $filieres_metiers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = categories_professionnel::where('nom', $request->cat_nom)->first()->id;

       $filieres_metiers = filieres_metiers::findOrFail($request->pro_id);

       $filieres_metiers->update([
       'nom' => $request->fil_nom,
       'code' => $request->code,
       'categorie_id' => $id,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\filieres_metiers  $filieres_metiers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $filieres_metiers = filieres_metiers::findOrFail($request->pro_id);
         $filieres_metiers->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



