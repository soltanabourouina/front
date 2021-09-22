@extends('layouts.master')

@section('title', 'Variantes de fichiers')

@section('content')
<div class="container">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-success" href="{{ route('addFileVariantGET') }}">Ajouter</a>
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>

    </div>
    <table class="table">
        <tr>
            <th>Code</th>
            <th>Libelle</th>
            <th>Type</th>
            <th class="text-end">Actions</th>
        </tr>
        @forelse ($file_variants as $file_variant) 
        <tr>
            <td>{{$file_variant->code}}</td>
            <td>{{$file_variant->label}}</td>
            <td>{{$file_variant->typeVerbose()}}</td>
            <td class="text-end">
                <a class="btn btn-warning" href="{{ route('editFileVariantGET', ['id' => $file_variant->id]) }}">Modifier</a>
                <a class="btn btn-danger" href="{{ route('deleteFileVariantGET', ['id' => $file_variant->id]) }}">Supprimer</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100">Aucune variante trouvée</td>
        </tr>
        @endforelse
    </table>
</div>
@stop