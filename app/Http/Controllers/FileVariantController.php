<?php

namespace App\Http\Controllers;

use App\FileVariant;
use Illuminate\Http\Request;

class FileVariantController extends Controller
{
    public function browse()
    {
        $file_variants = FileVariant::all();
        return view("FileVariant.browse", compact("file_variants"));
    }
    
    public function read()
    {
        //
    }
    
    public function editGET($id)
    {
        $file_variant = FileVariant::findOrFail($id);
        return view("FileVariant.edit", compact("file_variant"));
    }
    
    public function editPOST($id, Request $request)
    {
        $file_variant = FileVariant::findOrFail($id);
        $file_variant->code = $request->input("code");
        $file_variant->label = $request->input("label");
        $file_variant->type = $request->input("type");
        $file_variant->save();
        return redirect()->route('browseFileVariantsGET')->withSuccess('Variante de fichier modifiée avec succès.');
    }
    
    public function addGET()
    {
        return view("FileVariant.add");
    }
    
    public function addPOST(Request $request)
    {
        $file_variant = new FileVariant();
        $file_variant->code = $request->input("code");
        $file_variant->label = $request->input("label");
        $file_variant->type = $request->input("type");
        $file_variant->save();
        return redirect()->route('browseFileVariantsGET')->withSuccess('Variante de fichier ajoutée avec succès.');
    }
    
    public function delete($id)
    {
        $file_variant = FileVariant::findOrFail($id);
        $file_variant->delete();
        return redirect()->route('browseFileVariantsGET')->withSuccess('Variante de fichier supprimée avec succès.');
    }
}
