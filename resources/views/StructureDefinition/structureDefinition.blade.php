@extends('layouts.master')

@section('title', 'Définir la structure d\'un fichier')

@section('content')
<form action="{{route('saveSpreadsheetColumnStructureDefinition')}}" method="POST">
    @csrf
    <input type="hidden" name="colCount" value="{{count($lines->first())}}">
    <input type="hidden" name="type" value="{{$type}}">
    <input type="hidden" name="variant" value="{{$variant}}">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
      
        <button type="submit" class="btn btn-primary">Valider et enregister la structure</button>
    </div>
    <table class="table">
        @foreach ($lines->first() as $column => $cell)
        <tr>
            <td style="min-width: 150px">
                <select class="form-select" name="{{ $column }}">
                    @foreach ($columns as $key => $c)
                    <option value="{{ $c->name_bdd }}">{{$c->name_verbose}}</option>
                    @endforeach
                </select>
                {{-- @php(dd($lines->first(), $column)) --}}
                <input type="hidden" name="verbose_{{ $column }}" value="{{($lines->first())[$column]}}">
            </td>
            @foreach ($lines as $row => $line)
            @foreach ($line as $c => $cell)
            @if ($c == $column)
            <td>{{$cell}}</td>
            @endif
            @endforeach
            @endforeach
            <td>...</td>
        </tr>
        @endforeach
    </table>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
       
        <button type="submit" class="btn btn-primary">Valider et enregister la structure</button>
    </div>
</form>
@stop