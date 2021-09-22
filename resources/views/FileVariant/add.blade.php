@extends('layouts.master')

@section('title', 'Ajouter une variante de fichier')

@section('content')
<div class="w-25 m-auto">
   
    <form action="{{ route("addFileVariantPOST") }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Code">
        </div>
        <div class="form-group mb-3">
            <label for="label">Libelle</label>
            <input type="text" class="form-control" name="label" id="label" placeholder="Libelle">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            <select class="form-control" name="type" id="type">
                <option value="1">Fichier de personnel</option>
                <option value="2">Fichier de paie</option>
                <option value="3">Fichier de plan de paie</option>
            </select>
        </div>
        <div class="text-end">
            <a href="{{route('browseFileVariantsGET')}}" class="btn btn-danger">Annuler</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@stop