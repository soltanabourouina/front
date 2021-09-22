@extends('layouts.master')

@section('title', 'Modifier une variante de fichier')

@section('content')
<div class="w-25 m-auto">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
   
    <form action="{{ route("editFileVariantPOST", ["id" => $file_variant->id]) }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Code" value="{{ $file_variant->code }}">
        </div>
        <div class="form-group mb-3">
            <label for="label">Libelle</label>
            <input type="text" class="form-control" name="label" id="label" placeholder="Libelle" value="{{ $file_variant->label }}">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            @php
                $type = $file_variant->type;
            @endphp
            <select class="form-control" name="type" id="type">
                <option value="1" @if ($type == 1) selected @endif>Fichier de personnel</option>
                <option value="2" @if ($type == 2) selected @endif>Fichier de paie</option>
                <option value="3" @if ($type == 3) selected @endif>Fichier de plan de paie</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@stop