@extends('layouts.master')

@section('title', 'Lignes budgétaires d\'un fichier')

@section('content')
    <form action="{{ route('saveCodesBudgetairesPOST') }}" method="POST" class="container">
        @include('alerts')
        @csrf
        <div class="mb-3 text-end">
            <a href="{{route('home')}}" class="btn btn-warning">Retour</a>
          
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
        <input type="hidden" name="variant" value="{{ $variant }}">
        <table class="w-100">
            <tr>
                <th>Code rubrique</th>
                <th>Intitulé rubrique</th>
                <th>Regroupement principal</th>
                <th>Regroupement secondaire</th>
            </tr>
            @foreach ($planPaye as $planPayeRow)
            <tr>
                <td>{{ $planPayeRow->code_rubrique }}</td>    
                <td>{{ $planPayeRow->intitule_rubrique }}</td>   
                <td class="pe-1">
                    <select name="principal_{{ $loop->index }}" id="principal_{{ $loop->index }}" class="form-select principal">
                        <option value="0" data-secondaire="0" selected>Selectionner un regroupement principal</option>
                        @foreach ($codes_principales as $code_principal)
                        <option value="{{$code_principal->id}}" data-secondaire="{{ $code_principal->codesSecondaires()->first()->id }}">{{$code_principal->abreviation}} : {{$code_principal->name}}</option>
                        @endforeach
                    </select>
                </td>   
                <td>
                    <select disabled name="secondaire_{{ $loop->index }}" id="secondaire_{{ $loop->index }}" class="form-select secondaire">
                        <option value="0" selected>Selectionner d'abord un regroupement principal</option>
                        @foreach ($codes_secondaires as $code_secondaire)
                        <option value="{{$code_secondaire->id}}" data-principal="{{ $code_secondaire->codePrincipal()->id }}">{{$code_secondaire->abreviation}} : {{$code_secondaire->libelle_secondaire}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="mt-3 text-end">
            <a href="{{route('home')}}" class="btn btn-warning">Retour</a>
           
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>

    <script>
        $('.principal').on('change', function(e) {
            let index = $(this).attr('id');
            index = index.replace('principal_','');
            let selector = $(this).val();
            if (selector == 0) {
                $("#secondaire_" + index).prop('disabled', true);
                $("#secondaire_" + index).val($(this).find("option:selected").data('secondaire'));
            } else {
                $("#secondaire_" + index).prop('disabled', false);
                $("#secondaire_" + index + " > option").hide();
                $("#secondaire_" + index + " > option").filter(function(){return $(this).data('principal') == selector}).show();
            }
            $("#secondaire_" + index).val($(this).find("option:selected").data('secondaire'));
        });
    </script>
@stop