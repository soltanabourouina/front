<?php

namespace App\Http\Controllers;

use App\zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $zones = zone::all();
        return view('zones.index', compact('zones'));
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
        return zone::create($request->all());
        return view('zones.index', compact('zones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

        public function show($id)
        {
            $zones = zone::find($id);
       
            return view('zones.show',compact('zones'));
        }
         
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zones = zone::find($id);
        
        return view('zones.edit',compact('zones'));
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
           
            $zones = zone::find($id);
            $zones->update($input);
            return redirect()->route('zones.index')
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

        zone::find($id)->delete();
        return redirect()->route('zones.index')->with('success','Suppression');
    }
}









