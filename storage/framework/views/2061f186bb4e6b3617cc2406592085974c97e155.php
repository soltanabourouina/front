<?php $__env->startSection('css'); ?>
<style>
    /* style for date */
    .ui-datepicker-calendar {
    display: none;
    }
</style>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
Budget|scenarii|projection
<?php $__env->stopSection(); ?>
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php if(session()->has('Add')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Ajout a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('edit')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Modification a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('delete')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Suppression a été  effectuée avec succès",
                type: "error"
            });
        }

    </script>
<?php endif; ?>

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


                    <?php if(isset($yearInit)): ?> <!--année initial -->
                   
                       <tr> 
                      
                      
                        <?php echo e($budgetM1 = Helpers::showMonetaryValue($budM1->Sum('amount'))); ?>

                        <?php echo e($budgetM2 = Helpers::showMonetaryValue($budM2->Sum('amount'))); ?>

                        <?php echo e($budgetM3 = Helpers::showMonetaryValue($budM3->Sum('amount'))); ?>


                        <?php echo e($budgetM4 = Helpers::showMonetaryValue($budM4->Sum('amount'))); ?>

                        <?php echo e($budgetM5 = Helpers::showMonetaryValue($budM5->Sum('amount'))); ?>

                        <?php echo e($budgetM6 = Helpers::showMonetaryValue($budM6->Sum('amount'))); ?>


                        <?php echo e($budgetM7 = Helpers::showMonetaryValue($budM7->Sum('amount'))); ?>

                        <?php echo e($budgetM8 = Helpers::showMonetaryValue($budM8->Sum('amount'))); ?>

                       
                        <?php echo e($budgetM9 = Helpers::showMonetaryValue($budM9->Sum('amount'))); ?>

                        <?php echo e($budgetM10 = Helpers::showMonetaryValue($budM10->Sum('amount'))); ?>

                        <?php echo e($budgetM11 = Helpers::showMonetaryValue($budM11->Sum('amount'))); ?>

                        <?php echo e($budgetM12 = Helpers::showMonetaryValue($budM12->Sum('amount'))); ?>

                        <td width=10% >Budget initiale</td>
                        <td><?php echo e(($budgetM1)); ?></td>
                        <td><?php echo e($budgetM2); ?></td>
                        <td><?php echo e($budgetM3); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t1)); ?></td>
                        <td><?php echo e($budgetM4); ?></td>
                        <td><?php echo e($budgetM5); ?></td>
                        <td><?php echo e($budgetM6); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t2)); ?></td>
                        <td><?php echo e($budgetM7); ?></td>
                        <td><?php echo e($budgetM8); ?></td>
                        <td><?php echo e($budgetM9); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t3)); ?></td>
                        <td><?php echo e($budgetM10); ?></td>
                        <td><?php echo e($budgetM11); ?></td>
                        <td><?php echo e($budgetM12); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t4)); ?></td>
                      
                    </tr>
<!--effectif-->
<td width=10% >Effectif initiale</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                   
                        <TR>
                            <TD  colspan=2  bgcolor="#FFD700">Suivi</TD>
                            <TR >BUD</TR>
                            <TR >EFF</TR>
                            </TR>
                            <TR>
                            <TR >
                                <td>BUD</td>
                                <td><?php echo e(($budgetM1)); ?></td>
                        <td><?php echo e($budgetM2); ?></td>
                        <td><?php echo e($budgetM3); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t1)); ?></td>
                        <td><?php echo e($budgetM4); ?></td>
                        <td><?php echo e($budgetM5); ?></td>
                        <td><?php echo e($budgetM6); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t2)); ?></td>
                        <td><?php echo e($budgetM7); ?></td>
                        <td><?php echo e($budgetM8); ?></td>
                        <td><?php echo e($budgetM9); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t3)); ?></td>
                        <td><?php echo e($budgetM10); ?></td>
                        <td><?php echo e($budgetM11); ?></td>
                        <td><?php echo e($budgetM12); ?></td>
                        <td><?php echo e(Helpers::showMonetaryValue($t4)); ?></td>
                            </TR>


                            <TR >
                                <td>EFF</td>
<td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                        <td>8</td>
                            </TR>
                            </TR> 

                            <?php $__currentLoopData = $eff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                            <tr>
                            
                              
                                  
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   
                       
                    <?php endif; ?>
             
                
                   
                
            </tbody>
        </table>
    </div>
</div>














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
        <form action="<?php echo e(route('scenarii.store_ev')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            
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
                <select name="csp" id="csp" class="form-control" required>
                    <option value="" selected disabled> --indiquer le CSP--</option>
                    <?php $__currentLoopData = $csociopros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $csociopro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($csociopro->id); ?>"><?php echo e($csociopro->abreviation); ?>-<?php echo e($csociopro->libelle); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>
                </div>

                <div id="cat_id" class="col-lg-10" hidden>
                    <label for="catpro">Catégorie pro</label>
                    <select name="catpro" id="catpro" class="form-control" required>
                        <option value="" selected disabled> --indiquer la catégorie--</option>
                       <?php $__currentLoopData = $catprofs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $catprof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($catprof->id); ?>"><?php echo e($catprof->code); ?>-<?php echo e($catprof->nom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </select>
                    </div>

                    <div id="service_id" class="col-lg-10" hidden>
                        <label for="service">Service</label>
                        <select name="service" id="service" class="form-control" required>
                            <option value="" selected disabled> --indiquer le service--</option>
                             <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->c_service); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>

<br>
                    <div id="bud_id" class="col-lg-10" >
                    <label for="codebud">Code Budget</label>
                    <select name="codebud" id="codebud" class="form-control" required>
                        <option value="" selected disabled> --indiquer le code budgétaire--</option>
                        <?php $__currentLoopData = $coderegsegs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coderegseg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($coderegseg->id); ?>"><?php echo e($coderegseg->abreviation); ?>-<?php echo e($coderegseg->libelle_secondaires); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <input class="annee form-control" required  type="text">
                </div>
                <div class="form-group col-lg-6">
                    <label for="montant">mois *</label>
                    <input class="mois form-control" required  type="text">
                </div>
                    <div class="form-group col-lg-6">
                    <label for="duree_estime" >Durée</label>
                     <input class="form-control " required type="number" min="1" max="12" placeholder="en mois" id="duree_estime" name="duree_estime" >
                  
                </div> 
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
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
									<a class="modal-effect btn btn-outline-primary " data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un évenement Hors Budget</a>
								<?php endif; ?>
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
							
                                <th>Matricule </th>
                                
                                <th>CSP</th>
                                <th>Cat pro</th>
                                <th>Service</th>
                                <th>Code budget</th>
                                <th>Montant</th>
                                <th>Année</th>
                                <th>Mois</th>
                                <th>Durée</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($event->annee); ?></td>
                                    <td><?php echo e($event->mois); ?></td>
                                    <td><?php echo e($event->nbr_mois); ?></td>
                                    <td><?php echo e($event->montant); ?></td>
                                    <td><?php echo e($event->service); ?></td>
                                    <td><?php echo e($event->matricule); ?></td>
                                    <td><?php echo e($event->csociopros->code); ?></td>
                                    <td><?php echo e($event->coderegsegs->code); ?></td>
                                    <td><?php echo e($event->catprofs->code); ?></td>
                                    <td>
                                 
                               
                                  
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-danger btn-sm " data-pro_id="<?php echo e($event->id); ?>"
                                            data-etab_nom="<?php echo e($event->id); ?>" data-toggle="modal"
                                            data-target="#modaldemo9">supprimer</button>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <form action="scenarii/destroy" method="post">
                <?php echo e(method_field('delete')); ?>

                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <p>  Etes vous sur de vouloir supprimer cet evenement? </p><br>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<!--Internal  Datatable js -->

<script src="<?php echo e(URL::asset('assets/js/modal.js')); ?>"></script>
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
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
        document.getElementById("csp").required = true;
        document.getElementById("csp_id").hidden = false;

        document.getElementById("catpro").required = false;
        document.getElementById("cat_id").hidden = true;

        document.getElementById("service").required = false;
        document.getElementById("service_id").hidden = true;
 
      }
 if (choixpopu =="cat"){
        document.getElementById("csp").required = false;
        document.getElementById("csp_id").hidden = true;

        document.getElementById("catpro").required = true;
        document.getElementById("cat_id").hidden = false;

        document.getElementById("service").required = false;
        document.getElementById("service_id").hidden = true;
    
      }
 if (choixpopu =="service"){
        document.getElementById("csp").required = false;
        document.getElementById("csp_id").hidden = true;

        document.getElementById("catpro").required = false;
        document.getElementById("cat_id").hidden = true;

        document.getElementById("service").required = true;
        document.getElementById("service_id").hidden = false;

      }
     
      });

      
 
   } );

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/scenarii/index.blade.php ENDPATH**/ ?>