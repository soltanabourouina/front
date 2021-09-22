@extends('layouts.master')

@section('title', 'Ajouter une simulation')

@section('content')
    <div class="w-25 m-auto">
        @include('alerts')
        <form action="{{ route('createSimulationPOST') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
            </div>
            <div class="mb-3 text-end">
                <a href="{{route('simulationsGET')}}" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary">Ajouter une simulation</button>
            </div>
        </form>
    </div>
@stop