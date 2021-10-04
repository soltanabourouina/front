@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
structures
@stop
<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('title')
Structures de fichiers
@stop
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">   Liste des structures des fichiers clients</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="container">
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-success" href="{{ route('addFileVariantGET') }}">Ajouter</a>
        <a class="btn btn-warning" href="{{ route('home') }}">Retour</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="structures" data-page-length='50' style=" text-align: center;">
    
   
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
</div>
</div>
@stop
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->

<script>


    $(document).ready(function() {
    $('#structures').DataTable();
} );

</script>

@endsection
