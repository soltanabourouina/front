@extends('layouts.master')

@section('title', 'Simulations')

@section('content')
<div class="container">
    @include('alerts')
    <div class="row">
        <div class="col-6">
            @isset($budget)
            <h1 class="h5">Budget :</h1>
            <p class="h4">{{Helpers::showMonetaryValue($budget)}}</p>
            @endisset
        </div>
        <div class="text-end py-3 col-6">
            <a class="btn btn-success" href="{{ route('createSimulationGET') }}">Ajouter</a>
            <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
        
        </div>
    </div>
    <table class="table">
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Total Prévu</th>
            @isset($budget)
            <th>Delta</th>
            @endisset
            <th class="text-end">Actions</th>
        </tr>
        @forelse ($simulations as $simulation) 
        <tr>
            <td>{{$simulation->code}}</td>
            <td>{{$simulation->description}}</td>
            <td>{{Helpers::showMonetaryValue($simulation->getTotalOfYear())}}</td>
            @isset($budget)
            <td>{{Helpers::showMonetaryValue($simulation->getTotalOfYear() - $budget)}}</td>
            @endisset
            <td class="text-end">
                <a class="btn btn-primary my-1" href="{{ route('createSimulationEventGET', ['id' => $simulation->id]) }}">Ajouter un évenement</a>
                <a class="btn btn-warning my-1" href="{{ route('readSimulationGET', ['id' => $simulation->id]) }}">Détails</a>
                <a class="btn btn-success my-1" href="{{ route('confirmSimulationGET', ['id' => $simulation->id]) }}">Confirmer</a>
                <a class="btn btn-danger my-1" href="{{ route('deleteSimulationGET', ['id' => $simulation->id]) }}">Supprimer</a>
            </td>
        </tr>
        @empty
        <tr><td colspan="100">Aucune simulation trouvée</td></tr>
        @endforelse
    </table>
</div>
@stop