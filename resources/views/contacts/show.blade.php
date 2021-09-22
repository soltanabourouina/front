@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />



@section('title')
Affichage des permissions
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Permissions</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Affichage des permissions</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->


<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
            
                <div class="row">
                    <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Nom de l'entreprise: {{ $contact->nom_entreprise }}</h5>
                        </div>
                        <div class="card-body">
                          
                          <h6 class="card-text"><label>Nom - Prenom:</label>    {{ $contact->nom.' '.$contact->prenom }}</h6>
                          <h6 class="card-title"><label>Télephone: </label>     {{ $contact->tel }}</h6>
                          <h6 class="card-title"><label>Email: </label>          {{ $contact->email }}</h6>
                          <h6 class="card-title"><label>Titre: </label>       {{ $contact->titre }}</h6>
                          <h6 class="card-title"><label>Linkedin: </label>      {{ $contact->linkedin }}</h6>


                       
                          <a class="btn btn-primary btn-sm" href="{{ route('contacts.index') }}">Retour</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>

@endsection