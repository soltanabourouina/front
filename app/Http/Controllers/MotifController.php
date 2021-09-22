<?php

namespace App\Http\Controllers;

use App\sections;
use App\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Motif::all();


        $sections = sections::all();
        $motif = Motif::all();
        return view('motifs.motifs', compact('sections','motifs'));
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
        return Motif::create($request->all());
        session()->flash('Add', 'Ajout du motif avec succés ');
        return redirect('/motifs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idcontacts_id
     * @return \Illuminate\Http\Response
     */
    public function show($contacts_id)
    {
        return Motif::where('contacts_id', $contacts_id)->get();
    }

   /* public function show_Motif($contacts_id)
    {
        return Motif::find($contacts_id);
    }*/

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
        $Motif = Motif::find($id);
        $Motif->update($request->all());
        return $Motif;
        session()->flash('Edit', 'Modification avec succés');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Motif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    
        $Motif = Motif::findOrFail($request->id);
         $Motif->delete();
         session()->flash('delete', 'Motif supprimé avec succés');
         return back();
    }
}



