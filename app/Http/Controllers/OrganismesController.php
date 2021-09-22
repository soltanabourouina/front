<?php

namespace App\Http\Controllers;

use App\Organismes;
use Illuminate\Http\Request;

class OrganismesController extends Controller
{
       /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function manageCategory()

    {

        $categories = Organismes::where('parent_id', '=', 0)->get();

        $allCategories = Organismes::pluck('name','id')->all();

        return view('categoryTreeview',compact('categories','allCategories'));

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function addCategory(Request $request)

    {

        $this->validate($request, [

        		'name' => 'required',

        	]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        

        Organismes::create($input);

        return back()->with('success', 'New Category added successfully.');

    }


}