@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
$employees
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
            <h4 class="content-title mb-0 my-auto">Les Employés</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des employés</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')


@if (session()->has('show'))
    <script>
        window.onload = function() {
            notif({
                msg: " visualisation des informations de l'employé",
                type: "success"
            });
        }

    </script>
@endif



<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
           
           <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="showplus" tabindex="-1" role="dialog" aria-labelledby="showplusTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Carte employé</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="employees/show" method="get">
                {{ method_field('show') }}
                {{ csrf_field() }}
                <div class="modal-body">
                   
                    <input type="hidden" name="pro_id" id="pro_id" value="">
                   
                    <ul class="list-group list-group-flush">



                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Matricule: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                      
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">prenom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">sexe: </label>
                            <input class="form-control col-sm-10" name="sexe" id="sexe" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Date_de_naissance: </label>
                            <input class="form-control col-sm-6" name="date_nais" id="date_nais" type="date" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Nom: </label>
                            <input class="form-control col-sm-6" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>

                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>









                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>











                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                      
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>

                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>



                      </ul>
                </div>
              
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
      </div>
    </div>
  </div>

            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="$employees" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
                                <th>Matricule </th>
								<th>Nom </th>
                                <th>prenom </th>
                                <th>Genre </th>
                                <th>Date de naissance </th>
                                <th>Date d'ancienneté'</th>
                                <th>Voir plus</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($employees as $employee)
                                     <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employee->matricule}}</td>
                                    <td>{{ $employee->nom}}</td>
                                    
                                    <td>{{ $employee->prenom }}</td>
                                    <td>{{ $employee->sexe }}</td>
                                    <td>{{ $employee->date_de_naissance }}</td>
                                    <td>{{ $employee->date_anciennete }}</td>
                                    <td>
                                 
<button type="button" class="btn btn-secondary" 
data-pro_id="{{ $employee->id }}" data-emp_nom="{{ $employee->nom }}" 
data-emp_prenom="{{ $employee->prenom }}" data-sexe="{{ $employee->sexe }}"
data-date_nais="{{ $employee->date_de_naissance }}" data-date_anc="{{ $employee->date_anciennete }}" 
data-nat_cont="{{ $employee->nature_contrat }}" data-type_cont="{{ $employee->type_contrat }}"

data-v_niv="{{ $employee->v_niveau_classification }}" data-coef="{{ $employee->coef }}" 
data-sal_cont_pro="{{ $employee->salaire_contractuel_prorate }}" data-sal_cont_etp="{{ $employee->salaire_contractuel_etp }}"
data-sal_cont_an_etp="{{ $employee->salaire_contractuel_annuel_etp }}" data-coef_h="{{ $employee->coef_horaire }}" 
data-nbr_m_sal="{{ $employee->nbr_mois_salaire_de_base }}"data-sal_an_base="{{ $employee->salaire_annuel_de_base }}"
                                         
   
data-mod_moi="{{ $employee->mod_moi }}" data-niv_job="{{ $employee->niv_job }}" 
data-status="{{ $employee->status }}" data-c_actionnaire="{{ $employee->c_actionnaire }}"
data-c_co-actionnaire="{{ $employee->c_co_actionnaire}}" data-c_groupe="{{ $employee->c_groupe }}"
data-c_branche="{{ $employee->c_branche }}"data-c_division="{{ $employee->c_division }}" 
                                     

 data-c_business_unit="{{ $employee->c_business_unit }}" data-c_activite="{{ $employee->c_activite }}"
 data-c_sous-activite="{{ $employee->c_sous_activite }}" data-c_filiere_metier="{{ $employee->c_sous_filiere_metier}}" 
 data-c_zone="{{ $employee->c_zone }}" data-c_pays="{{ $employee->c_pays }}"
  data-c_societe_Entite_legale="{{ $employee->c_societe_Entite_legale }}" 
      
  data-c_region="{{ $employee->c_region }}" data-c_departement="{{ $employee->c_departement }}" 
  data-c_etab="{{ $employee->c_etab }}" data-c_direction="{{ $employee->c_direction }}"
 data-c_service="{{ $employee->c_service}}" data-c_unite="{{ $employee->c_unite }}"
  data-c_atelier="{{ $employee->c_atelier }}"
  data-pcs_ese="{{ $employee->pcs_ese }}" 
  
  data-invalide="{{ $employee->invalide }}" data-rqth="{{ $employee->rqth }}"
   data-idcc="{{ $employee->idcc }}" data-temps_travail="{{ $employee->temps_travail }}"
 data-reference_horaire="{{ $employee->reference_horaire}}" data-cat_pro="{{ $employee->cat_pro }}" 
 data-c_categorie_prof_resolue="{{ $employee->c_categorie_prof_resolue }}"
  data-c_classification="{{ $employee->c_classification }}"                                   
                                          
  data-c_metier_resolu="{{ $employee->c_metier_resolu }}" data-c_emploi="{{ $employee->c_emploi }}"   
                                         
                                       
                                         data-toggle="modal" 
                                         data-target="#showplus">
                                           Plus {{ $employee->id }}
                                        </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
    <!--/div-->
     
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
       $('#showplus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var emp_nom = button.data('emp_nom')
        var sexe = button.data('sexe')
        var date_nais = button.data('date_nais')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #emp_nom').val(emp_nom);
        modal.find('.modal-body #sexe').val(sexe);
        modal.find('.modal-body #date_nais').val(date_nais);
    })

 


</script>
@endsection
