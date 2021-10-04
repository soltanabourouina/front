@extends('layouts.master')
@section('css')
<style>
    /* style for date */
    .ui-datepicker-calendar {
    display: none;
    }

    #colorone {
    background-color: #00d2fc;
    color: #000000;
   }

   #colortwo {
    background-color: #4ffbdf;
    color: #000000;
   }

   #colorthree {
    background-color: #9ad4d0;
    color: #000000;
   }

   #colorfour {
    background-color: #fbeaff;
    color: #000000;
   }
</style>

  <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
Budget|scenarii|projection
@stop
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Budget Initial et suivi</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                scenarii</span>
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


<div class="card-body">
    <div class="table-responsive">
        <table id="bud" class="display" style="width:100%">
         
            <thead>
                <tr>
                  

                    <th rowspan="2">#</th>
                    <th>1</th>
                    <th>2 </th>
                    <th>3 </th>
                    <th>Tot Trim1 </th>
                    <th>4</th>
                    <th>5 </th>
                    <th>6 </th>
                    <th>Tot Trim2 </th>
                    <th>7</th>
                    <th>8 </th>
                    <th>9</th>
                    <th>Tot Trim3 </th>
                    <th>10</th>
                    <th>11 </th>
                    <th>12</th>
                    <th>Tot Trim4 </th>
                </tr>
            </thead>
            <tbody>


                    @isset($yearInit) <!--année initial -->
                   
                       <tr> 
                      
                      
                        {{$budgetM1 = Helpers::showMonetaryValue($budM1->Sum('amount'))}}
                        {{$budgetM2 = Helpers::showMonetaryValue($budM2->Sum('amount'))}}
                        {{$budgetM3 = Helpers::showMonetaryValue($budM3->Sum('amount'))}}

                        {{$budgetM4 = Helpers::showMonetaryValue($budM4->Sum('amount'))}}
                        {{$budgetM5 = Helpers::showMonetaryValue($budM5->Sum('amount'))}}
                        {{$budgetM6 = Helpers::showMonetaryValue($budM6->Sum('amount'))}}

                        {{$budgetM7 = Helpers::showMonetaryValue($budM7->Sum('amount'))}}
                        {{$budgetM8 = Helpers::showMonetaryValue($budM8->Sum('amount'))}}
                       
                        {{$budgetM9 = Helpers::showMonetaryValue($budM9->Sum('amount'))}}
                        {{$budgetM10 = Helpers::showMonetaryValue($budM10->Sum('amount'))}}
                        {{$budgetM11 = Helpers::showMonetaryValue($budM11->Sum('amount'))}}
                        {{$budgetM12 = Helpers::showMonetaryValue($budM12->Sum('amount'))}}
                        <td width=10% >Budget initial</td>
                        <td>{{($budgetM1) }}</td>
                        <td>{{$budgetM2}}</td>
                        <td>{{$budgetM3}}</td>
                        <td>{{Helpers::showMonetaryValue($t1)}}</td>
                        <td>{{$budgetM4}}</td>
                        <td>{{$budgetM5}}</td>
                        <td>{{$budgetM6}}</td>
                        <td>{{Helpers::showMonetaryValue($t2)}}</td>
                        <td>{{$budgetM7}}</td>
                        <td>{{$budgetM8}}</td>
                        <td>{{$budgetM9}}</td>
                        <td>{{Helpers::showMonetaryValue($t3)}}</td>
                        <td>{{$budgetM10}}</td>
                        <td>{{$budgetM11}}</td>
                        <td>{{$budgetM12}}</td>
                        <td>{{Helpers::showMonetaryValue($t4)}}</td>
                      
                    </tr>
<!--effectif-->
<td width=10% >Effectif initial</td>
             
                   
                        <TR>
                            <TD  colspan=2  bgcolor="#FFD700">Suivi</TD>
                            <TR >BUD</TR>
                            <TR >EFF</TR>
                            </TR>
                            <TR>
                            <TR >
                                <td>BUD</td>
                                <td>{{($budgetM1) }}</td>
                        <td>{{$budgetM2}}</td>
                        <td>{{$budgetM3}}</td>
                        <td>{{Helpers::showMonetaryValue($t1)}}</td>
                        <td>{{$budgetM4}}</td>
                        <td>{{$budgetM5}}</td>
                        <td>{{$budgetM6}}</td>
                        <td>{{Helpers::showMonetaryValue($t2)}}</td>
                        <td>{{$budgetM7}}</td>
                        <td>{{$budgetM8}}</td>
                        <td>{{$budgetM9}}</td>
                        <td>{{Helpers::showMonetaryValue($t3)}}</td>
                        <td>{{$budgetM10}}</td>
                        <td>{{$budgetM11}}</td>
                        <td>{{$budgetM12}}</td>
                        <td>{{Helpers::showMonetaryValue($t4)}}</td>
                            </TR>


                            <TR>
                                <td>EFF</td>

                            </TR>
                            </TR> 

                            @foreach ($eff as $ef)
  
                            <tr>
                            
                              
                                  
                        </tr>
                        @endforeach

                   
                       
                    @endisset
             
                
                   
                
            </tbody>
        </table>
    </div>
</div>


{{-- fin partie projection --}}

{{-- debut partie scénarii --}}









<div class="row row-md">
    <div class="col-md-12">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un  évènement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('scenarii.store') }}" method="post">
            {{ csrf_field() }}
            
                <div class="col-md-10">
                    <label class="form-label"> Filtrer sur:</label>
                    <select name="choixpop" id="choixpop" class="choixpop form-control  custom-select">

                        <option value="" selected disabled> --indiquer le filtre--</option>
                        <option value="1">Un matricule</option>
                        <option value="2">Une population </option>
                    </select>
                </div>
           
<br>
            <div  id="mat_id" class="container-input pull-center" hidden>
                <div class="col-lg-10">
                    <label class="form-label"> Matricule</label>
                    <input type="text" id="matricule"  name="matricule" required>
                </div>
            </div> 


                <div id ="popul_id"  hidden>
                    <div class="col-lg-10">
                        <label class="form-label"> Popultion :</label>
                        <select name="popul" id="popul" class="populations form-control  custom-select" required >
                        
                            <option value="" selected disabled> --indiquer la population--</option>
                            <option value="csp">CSP</option>
                            <option value="cat">catégorie pro </option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                </div>

<br>
                <div id="csp_id" class="col-lg-10" hidden>
                <label for="csp">Catégorie Socio-pro</label>
                <select name="csp_id" id="csp_id" class="form-control" required>
                    <option value="" selected disabled> --indiquer le CSP--</option>
                    @foreach ($csociopros as $key => $csociopro)
                        <option value="{{ $csociopro->id }}">{{ $csociopro->abreviation}}-{{$csociopro->libelle }}</option>
                    @endforeach 
                </select>
                </div>

                <div id="cat_id" class="col-lg-10" hidden>
                    <label for="catpro">Catégorie pro</label>
                    <select name="catpro_id" id="catpro_id" class="form-control" required>
                        <option value="" selected disabled> --indiquer la catégorie--</option>
                       @foreach ($catprofs as $key => $catprof)
                            <option value="{{ $catprof->id }}">{{ $catprof->code }}-{{ $catprof->nom }}</option>
                        @endforeach 
                    </select>
                    </div>

                    <div id="service_id" class="col-lg-10" hidden>
                        <label for="service">Service</label>
                        <select name="service" id="service" class="form-control" required>
                            <option value="" selected disabled> --indiquer le service--</option>
                             @foreach ($services as $key => $service)
                                <option value="{{ $service->id }}">{{ $service->c_service }}</option>
                            @endforeach
                        </select>
                        </div>

<br>
                    <div id="bud_id" class="col-lg-10" >
                    <label for="codebud">Code Budget</label>
                    <select name="codebud_id" id="codebud_id" class="form-control" required>
                        <option value="" selected disabled> --indiquer le code budgétaire--</option>
                        @foreach ($coderegsegs as $key => $coderegseg)
                            <option value="{{ $coderegseg->id }}">{{ $coderegseg->abreviation }}-{{ $coderegseg->libelle_secondaires}}</option>
                        @endforeach
                    </select>
                    </div>
    <br>
                <div class="form-group col-lg-10">
                    <label for="montant"> Montant*</label>
                    <input type="number" class="form-control" id="montant" name="montant" required>
                </div>
<br>
                <div class="row">
               
                    <div class="form-group col-lg-6">
                    <label for="annee">Année *</label>
                    <input class="annee form-control" required id="annee" name="annee" type="number">
                </div>
                <div class="form-group col-lg-6">
                    <label for="montant">mois *</label>
                    <input class="mois form-control" required  id="mois" name="mois" type="number">
                </div>
                    <div class="form-group col-lg-6">
                    <label for="duree_estime" >Durée</label>
                     <input class="form-control " required type="number" min="1" max="12" placeholder="en mois" id="duree_estime" name="duree_estime" >
                  
                </div> 
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
										data-toggle="modal" href="#exampleModal"> Ajouter un évenement Hors Budget</a>
								@endcan
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="evenements" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
							
                                <th>Population / Matricule </th>
                                
                                <th>Filtre sur: </th>
                              

                                <th>Code budget</th>
                               
                                <th>Année</th>
                                <th>Mois</th>
                                <th>Durée</th>
                                <th>Montant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($events as $event)
                                     <tr>
                                    <td>{{ ++$i }}</td>
{{-- choix population matricule ou popul --}}
                                    @if( $event->choixpop == 1)
                                    <td>{{ $event->matricule}}</td>
                                    @elseif( $event->choixpop == 2)
                                    <td>{{ $event->popul}}</td>
                                    @endif 
{{-- filtre sur csp,codebud(coderegroupementsec),categorie --}}

@if ($event->popul == "cat") 
<td id="colorone">{{$event->catpro->nom}}</td>

@elseif($event->popul == "csp") 
<td id="colortwo">{{ $event->csp->libelle }}</td>

@elseif($event->popul == "service") 
<td id="colorthree">{{ $event->service}}</td>
@elseif ($event->popul == NULL) 
<td id="colorfour">matricule</td>
@endif


                            
                                    <td>{{ $event->codebud->abreviation }}</td>

                                    <td>{{ $event->annee}}</td>
                                    <td>{{ $event->mois}}</td>
                                    <td>{{ $event->nbr_mois}}</td>
                                    <td>{{ $event->montant}}</td>
                                                                     
                                
                                    <td>
                                 
                               
                                  
                                    @can('utilisateurs')
                                        <button class="btn btn-danger btn-sm " data-pro_id="{{ $event->id }}"
                                            data-etab_nom="{{ $event->id }}" data-toggle="modal"
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
    
    </div>
 
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Supprimer un evenement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="scenarii/destroy_ev" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>  Etes vous sur de vouloir supprimer cet evenement? </p><br>
                    <input type="hidden" name="pro_id" id="pro_id" value="">
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










  

<script type="text/javascript">
  $('.annee').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
       $('.mois').datepicker({
         minViewMode: 1,
         format: 'mm'
       });
</script> 

</div>
</div>
</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<!--Internal  Datatable js -->

<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>




    $(document).ready(function() {
    var table = $('#bud').DataTable( {
       
       retrieve: true,
   
        "order": [[1, 'asc']]
    } );
    $(document).ready(function() {
    $('#evenements').DataTable();
} );

$('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var etab_nom = button.data('etab_nom')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #etab_nom').val(etab_nom);
    })

    
    $("select.choixpop").change(function(){
        var choix = $(this).children("option:selected").val();
      if (choix ==1){
        document.getElementById("popul").required = false;
        document.getElementById("popul_id").hidden = true;

        document.getElementById("matricule").required = true;
        document.getElementById("mat_id").hidden = false;
      }
     if (choix !=1){
        document.getElementById("popul").required = true;
        document.getElementById("popul_id").hidden = false;


        document.getElementById("matricule").required = false;
        document.getElementById("mat_id").hidden = true;
      }
      });


      $("select.populations").change(function(){
        var choixpopu = $(this).children("option:selected").val();
      if (choixpopu =="csp"){
        document.getElementById("csp_id").required = true;
        document.getElementById("csp_id").hidden = false;

        document.getElementById("catpro_id").required = false;
        document.getElementById("cat_id").hidden = true;

        document.getElementById("service").required = false;
        document.getElementById("service_id").hidden = true;
 
      }
 if (choixpopu =="cat"){
        document.getElementById("csp_id").required = false;
        document.getElementById("csp_id").hidden = true;

        document.getElementById("catpro_id").required = true;
        document.getElementById("cat_id").hidden = false;

        document.getElementById("service").required = false;
        document.getElementById("service_id").hidden = true;
    
      }
 if (choixpopu =="service"){
        document.getElementById("csp_id").required = false;
        document.getElementById("csp_id").hidden = true;

        document.getElementById("catpro_id").required = false;
        document.getElementById("cat_id").hidden = true;

        document.getElementById("service").required = true;
        document.getElementById("service_id").hidden = false;

      }
     
      });

      
 
   } );

</script>

@endsection
