<?php

namespace App\Http\Controllers;

use App\categories_professionnel;

use Illuminate\Http\Request;

class Categories_professionnelController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories_professionnel = categories_professionnel::orderBy('id','DESC')->paginate(5);
        return view('categories_professionnel.index', compact('categories_professionnel'))
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
        categories_professionnel::create($request->all());
      //  return view('categories_professionnel.index', compact('categories_professionnel'));
        
        session()->flash('Add', 'La nouvelle catégorie a été ajoutée avec succés');
        return redirect('/categories_professionnel');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\categories_professionnel  $categories_professionnel
     * @return \Illuminate\Http\Response
     */
    public function show(categories_professionnel $categories_professionnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories_professionnel  $categories_professionnel
     * @return \Illuminate\Http\Response
     */
    public function edit(categories_professionnel $categories_professionnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories_professionnel  $categories_professionnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       $categories_professionnel = categories_professionnel::findOrFail($request->pro_id);

       $categories_professionnel->update([
       'nom' => $request->cat_nom,
       'code' => $request->code,
       'Status' => $request->Status,
       ]);

       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories_professionnel  $categories_professionnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $categories_professionnel = categories_professionnel::findOrFail($request->pro_id);
         $categories_professionnel->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}



