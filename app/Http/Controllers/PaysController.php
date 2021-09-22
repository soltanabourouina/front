<?php

namespace App\Http\Controllers;

use App\pays;
use Illuminate\Http\Request;

class PaysController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $pays = pays::all();
        return view('pays.index', compact('pays'));
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
        return pays::create($request->all());
        return view('pays.index', compact('pays'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

        public function show($id)
        {
            $pays = pays::find($id);
       
            return view('pays.show',compact('pays'));
        }
         
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = pays::find($id);
        
        return view('pays.edit',compact('pays'));
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
        //$Contact = Contact::find($id);
        //$Contact->update($request->all());
       // return $Contact;

        {
            $this->validate($request, [
            'libelle' => 'required',
            
            'code' => 'required'
            ]);
            $input = $request->all();
           
            $pays = pays::find($id);
            $pays->update($input);
            return redirect()->route('pays.index')
            ->with('success','Modification');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        pays::find($id)->delete();
        return redirect()->route('pays.index')->with('success','Suppression');
    }
}
