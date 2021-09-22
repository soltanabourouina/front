<?php $__env->startSection('css'); ?>

    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
Budget|scenarii|projection
<?php $__env->stopSection(); ?>
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Budget|scenarii|projection</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
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
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un scenario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo e(route('scenarii.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="numscenario"> numscenario scenarii*</label>
                    <input type="text" class="form-control" id="numscenario" name="numscenario" required>
                </div>
                <div class="form-group">
                    <label for="total"> total du scenarii *</label>
                    <input type="text" class="form-control" id="total" name="total" required>
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



<br>
<br>
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

                        <td>BUD 01 <br>
                            
                        </td>
                      
                        
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
                       
                    <?php endif; ?>
             
                
                   
                
            </tbody>
        </table>
    </div>
</div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            
							<div class="col-lg-6 justify-content-between">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
									<a class="modal-effect btn btn-primary" data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un scenarii</a>
                                        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
                                        <?php endif; ?>

                            
							</div>
                        </div>
                    </div>
                    <br>
                </div>

</div>
       <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title"> Supprimer un scenario</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="scenarii/destroy" method="post">
                   <?php echo e(method_field('delete')); ?>

                   <?php echo e(csrf_field()); ?>

                   <div class="modal-body">
                       <p>  Etes vous sur de vouloir supprimer ce scenario? </p><br>
                       <input type="hidden" name="pro_id" id="pro_id" value="">
                       <input class="form-control" name="numscenario" id="numscenario" type="text" readonly>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                       <button type="submit" class="btn btn-danger">Valider</button>
                   </div>
               </form>
           </div>
       </div>
   </div>  



<br>
<br>





















            <div class="card-body">
                <div class="table-responsive">
					<table id="scenarii" class="display" style="width:100%"
						<thead>
                        <thead>
                            <tr>
                                <th>numero du scenario</th>
								<th>total </th>
                                <th>Evenements </th>
                                <th>valide </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $scenarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scenarii): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                   
                                   
                                    <td><?php echo e($scenarii->numscenario); ?></td>
									<td><?php echo e($scenarii->total); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $scenarii->postedepenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postedepense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div striped>
                                         <?php echo e($postedepense->code); ?>

                                           </div> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </td>
                                    <td>
                                        <?php if($scenarii->isvalid == 0): ?>
                                            

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('afficher permissions')): ?>
                                                 <a class="btn btn-outline-success btn-sm"<?php echo e($scenarii->isvalid); ?>>valider le scenario</a>
                                                 <?php endif; ?>
                                            
                                        <?php else: ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('afficher permissions')): ?>
                                                <a class="btn btn-gray btn-sm" <?php echo e($scenarii->isvalid); ?>"> Mode projection sur le scénario <?php echo e($scenarii->numscenario); ?></a>
                                                <?php endif; ?>
                                       
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                       
                                        
                                      
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-danger btn-sm " data-pro_id="<?php echo e($scenarii->id); ?>"
                                            data-numscenario="<?php echo e($scenarii->numscenario); ?>" data-toggle="modal"
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
    <!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
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



$('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var numscenario = button.data('numscenario')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #numscenario').val(numscenario);
    });
$(document).ready(function() {
    var table = $('#scenarii').DataTable( {
       
       retrieve: true,
   
        "order": [[1, 'asc']]
    } );
   
   

    } );

    $(document).ready(function() {
    var table = $('#bud').DataTable( {
       
       retrieve: true,
   
        "order": [[1, 'asc']]
    } );
   
   

    } );

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/scenarii/index.blade.php ENDPATH**/ ?>