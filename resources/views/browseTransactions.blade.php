@extends('layouts.master')

@section('title', 'Transactions')

@section('content')
<div class="container">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>
    </div>
    <table class="table">
        <tr>
            <th>Fichier</th>
            <th>Type de transaction</th>
            <th>Date de transaction</th>
            <th class="text-end">Actions</th>
        </tr>
        @foreach ($transactions as $transaction) 
        <tr>
            <td>{{$transaction->fileName}}</td>
            <td>{{$transaction->fileType}}</td>
            <td>{{$transaction->created_at}}</td>
            <td class="text-end">
                @if ($transaction->is_latest())
                <a class="btn btn-danger" href="{{ route('cancelTransactionGET', ['id' => $transaction->id]) }}">Annuler</a>
                @else
                <a class="btn btn-secondary " href="#">Annuler</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop