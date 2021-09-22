@extends('layouts.master')

@section('title', 'Evenements')

@section('content')
<div class="container">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
    <div class="accordion" id="accordionExample">
    @php
        $no_employee_list = ["ETABLISSEMENT_CREATE"];
    @endphp
    @foreach ($eventsByMonth as $key => $currentMonthEvents)
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{$key}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                {{Helpers::getMonthNameFromNumber($currentMonthEvents['period']['month'])}} {{$currentMonthEvents['period']['year']}}
            </button>
          </h2>
          <div id="collapse{{$key}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table">
                    <tr>
                        <th>Intitulé</th>
                        <th>Concerne</th>
                        <th>Ancienne valeure</th>
                        <th>Nouvelle valeure</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    @foreach ($currentMonthEvents['events'] as $event)
                    <tr>
                        <td>{{$event->action}}</td>
                        @if (!in_array($event->action, $no_employee_list))
                        <td>{{$event->employee()->full_name()}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>{{$event->old}}</td>
                        <td>{{$event->new}}</td>
                        <td class="text-end">
                            <a class="btn btn-danger" href="{{ route('cancelEventGET', ['id' => $event->id]) }}">Annuler</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
        </div>
    @endforeach
    </div>
</div>
@stop