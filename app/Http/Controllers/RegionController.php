<?php

namespace App\Http\Controllers;

use App\region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $regions = region::all();
        return view('regions.index', compact('regions'));
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
        return region::create($request->all());
        return view('regions.index', compact('regions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

        public function show($id)
        {
            $regions = region::find($id);
       
            return view('regions.show',compact('regions'));
        }
         
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions = region::find($id);
        
        return view('regions.edit',compact('regions'));
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
            'nom' => 'required',
            
            
            ]);
            $input = $request->all();
           
            $regions = region::find($id);
            $regions->update($input);
            return redirect()->route('regions.index')
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

        region::find($id)->delete();
        return redirect()->route('regions.index')->with('success','Suppression');
    }
}
