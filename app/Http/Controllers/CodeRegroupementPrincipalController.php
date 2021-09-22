<?php

namespace App\Http\Controllers;

use App\CodeRegroupementPrincipal;

use Illuminate\Http\Request;

class CodeRegroupementPrincipalController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $CodeRegroupementPrincipals = CodeRegroupementPrincipal::orderBy('id','DESC')->paginate(5);
        return view('CodeRegroupementPrincipal.index', compact('CodeRegroupementPrincipals'))
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
        CodeRegroupementPrincipal::create($request->all());
      //  return view('CodeRegroupementPrincipal.index', compact('CodeRegroupementPrincipal'));
        
        session()->flash('Add', 'ajoutée avec succés');
        return redirect('/CodeRegroupementPrincipal');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\CodeRegroupementPrincipal  $CodeRegroupementPrincipal
     * @return \Illuminate\Http\Response
     */
    public function show(CodeRegroupementPrincipal $CodeRegroupementPrincipals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CodeRegroupementPrincipal  $CodeRegroupementPrincipals
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeRegroupementPrincipal $CodeRegroupementPrincipals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CodeRegroupementPrincipal  $CodeRegroupementPrincipal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $CodeRegroupementPrincipal = CodeRegroupementPrincipal::findOrFail($request->id);

       $CodeRegroupementPrincipal->update([
       'name' => $request->name,
       'abreviation' => $request->abreviation,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CodeRegroupementPrincipal  $CodeRegroupementPrincipal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $CodeRegroupementPrincipals = CodeRegroupementPrincipal::findOrFail($request->id);
         $CodeRegroupementPrincipals->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



