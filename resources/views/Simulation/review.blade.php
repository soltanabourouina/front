@extends('layouts.master')

@section('title', 'Simulations')

@section('content')
<div class="container">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
    <div>
        <table class="w-100 m-auto">
            <tr>
                <th>Simulation</th>
                <th>Budget</th>
                @for ($i = 1; $i <= 12; $i++)
                <th>{{Helpers::getMonthNameFromNumber($i)}}</th>
                @endfor
            </tr>
            <tr>
                <td>1</td>
                <td>{{$budget}}</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{$monthly}}</td>
                @endfor
            </tr>
        </table>
    </div>
</div>
@stop