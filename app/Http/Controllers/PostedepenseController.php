<?php

namespace App\Http\Controllers;

use App\categories_professionnel;
use App\CategorieSocioprofessionelle;
use App\CodeRegroupementSecondaire;
use App\PersonnelFileRow;
use App\postedepense;
use Illuminate\Http\Request;

class PostedepenseController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coderegsegs=CodeRegroupementSecondaire::all();
        $csociopros=CategorieSocioprofessionelle::all();
        $catprofs=categories_professionnel::all();
        $services=PersonnelFileRow::orderBy('c_service', 'ASC') ->where('c_service', '<>', NULL) ->get('c_service'); 
        $postedepenses = postedepense::orderBy('id','DESC')->paginate(5);
        return view('postesdepense.index', compact('postedepenses','coderegsegs','csociopros','catprofs','services',))
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
         postedepense::create($request->all());
      //  return view('postedepense.index', compact('postedepense'));
        
        session()->flash('Add', 'Ajouté avec succés');
        return redirect('/postesdepense');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\postedepense  $postedepense
     * @return \Illuminate\Http\Response
     */
    public function show(postedepense $postedepense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\postedepense  $postedepense
     * @return \Illuminate\Http\Response
     */
    public function edit(postedepense $postedepense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\postedepense  $postedepense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


       $postedepense = postedepense::findOrFail($request->pro_id);

       $postedepense->update([
       'libelle' => $request->libelle,
       'code' => $request->code,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\postedepense  $postedepense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $postedepense = postedepense::findOrFail($request->pro_id);
         $postedepense->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



