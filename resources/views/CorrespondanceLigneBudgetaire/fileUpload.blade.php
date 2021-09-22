@extends('layouts.master')

@section('title', 'Définir les lignes budgétaires')

@section('content')
    <div class="w-25 m-auto">
        @include('alerts')
        <form action="{{ route('codesBudgetairesDefinePOST') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="variant">Variante de fichier</label>
                <select name="variant" id="variant" class="form-select">
                    @foreach ($file_variants as $file_variant)
                    <option value="{{$file_variant->code}}">{{$file_variant->label}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <input class="form-control" type="file" name="file" id="formFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
            <div class="mb-3 text-end">
                <a href="{{route('home')}}" class="btn btn-danger">Annuler</a>

                <button type="submit" class="btn btn-primary">Extraire les codes budgétaires</button>
            </div>
        </form>
    </div>
@stop