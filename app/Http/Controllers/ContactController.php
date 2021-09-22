<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
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
        return Contact::create($request->all());
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

        public function show($id)
        {
            $contact = Contact::find($id);
       
            return view('contacts.show',compact('contact'));
        }
         
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        
        return view('contacts.edit',compact('contact'));
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
            'nom_entreprise' => 'required',
            'nom' => 'required',
            'email' => 'required|email|unique:contacts,email,'.$id,
            'titre' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'linkedin' => 'required'
            ]);
            $input = $request->all();
           
            $contact = Contact::find($id);
            $contact->update($input);
            return redirect()->route('contacts.index')
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

        Contact::find($id)->delete();
        return redirect()->route('contacts.index')->with('success','Suppression');
    }
}









