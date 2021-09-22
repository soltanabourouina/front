@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
Code de regroupement secondaire
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
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Code de regroupement secondaire</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des Codes de regroupements secondaires</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')


@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: " la Ajout a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: " la Modification a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " la Suppression a été  effectuée avec succès",
                type: "error"
            });
        }

    </script>
@endif

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un  Code de regroupement secondaire</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('etablissements.store') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">
               
                <div class="form-group">
                    <label for="nom"> Nom de l'etablissement *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="code"> Code*</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Departement</label>
                <select name="departement_id" id="departement_id" class="form-control" required>
                    <option value="" selected disabled> --indiquer le département--</option>
                    @foreach ($departements as $key => $departement)
                        <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
</div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            
							<div class="d-flex justify-content-between">
								@can('utilisateurs')
									<a class="modal-effect btn btn-outline-primary " data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un établissement</a>
								@endcan
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="etablissements" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
								<th>Nom de l'etablissement </th>
                                <th>code </th>
                                <th>Departement </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($etablissements as $etablissement)
                                     <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $etablissement->nom}}</td>
                                    <td>{{ $etablissement->code}}</td>
                                    <td>{{ $etablissement->departement->nom }}</td>
                                    <td>
                                 
                               
                                        @can('utilisateurs')
                                        <button class="btn btn-success btn-sm"
                                            data-etab_nom="{{ $etablissement->nom }}" data-pro_id="{{ $etablissement->id }}"
                                            data-dep_nom="{{ $etablissement->departement->nom }}"
                                            data-code="{{ $etablissement->code }}" data-toggle="modal"
                                            data-target="#edit_Product">modifier</button>
                                    @endcan

                                    @can('utilisateurs')
                                        <button class="btn btn-danger btn-sm " data-pro_id="{{ $etablissement->id }}"
                                            data-etab_nom="{{ $etablissement->nom }}" data-toggle="modal"
                                            data-target="#modaldemo9">supprimer</button>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Modifier l'établissement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='etablissements/update' method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title"> Nom de l'établissement :</label>

                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                <input type="text" class="form-control" name="etab_nom" id="etab_nom">
                            </div>
                            <div class="form-group">
                                <label for="des">Code :</label>
                                <input type="text"  name="code"  id='code'
                                    class="form-control">
                            </div>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Département</label>
                            <select name="dep_nom" id="dep_nom" class="custom-select my-1 mr-sm-2" required>
                                @foreach ($departements as $departement)
                                    <option>{{ $departement->nom }}</option>
                                @endforeach
                            </select>

                          

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Modifier l'établissement</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
       <!-- delete -->
       <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title"> Supprimer un etablissement</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="etablissements/destroy" method="post">
                   {{ method_field('delete') }}
                   {{ csrf_field() }}
                   <div class="modal-body">
                       <p>  Etes vous sur de vouloir supprimer cet etablissement? </p><br>
                       <input type="hidden" name="pro_id" id="pro_id" value="">
                       <input class="form-control" name="etab_nom" id="etab_nom" type="text" readonly>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                       <button type="submit" class="btn btn-danger">Valider</button>
                   </div>
               </form>
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
    $('#edit_Product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var etab_nom = button.data('etab_nom')
        var dep_nom = button.data('dep_nom')
        var pro_id = button.data('pro_id')
        var code = button.data('code')
        var modal = $(this)
        modal.find('.modal-body #etab_nom').val(etab_nom);
        modal.find('.modal-body #dep_nom').val(dep_nom);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #pro_id').val(pro_id);
    })


    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var etab_nom = button.data('etab_nom')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #etab_nom').val(etab_nom);
    })

    $(document).ready(function() {
    $('#etablissements').DataTable();
} );

</script>

@endsection
