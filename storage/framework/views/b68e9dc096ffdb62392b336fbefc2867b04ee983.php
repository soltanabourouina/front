<?php $__env->startSection('css'); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
Filieres metiers
<?php $__env->stopSection(); ?>
<!-- Internal Data table css -->

<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
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
            <h4 class="content-title mb-0 my-auto">Etablissements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des Etablissements</span>
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
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un  etablissement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo e(route('filieres_metiers.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

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
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <option value="" selected disabled> --indiquer la catégore professionnel--</option>
                    <?php $__currentLoopData = $categories_professionnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categories_professionnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categories_professionnel->id); ?>"><?php echo e($categories_professionnel->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
									<a class="modal-effect btn btn-outline-primary " data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un établissement</a>
								<?php endif; ?>
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
								<th>Nom de la filière-métier </th>
                                <th>code </th>
                                <th>Departement </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = $filieres_metiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filieres_metier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($filieres_metier->nom); ?></td>
                                    <td><?php echo e($filieres_metier->code); ?></td>
                                    <td><?php echo e($filieres_metier->categorie->nom); ?></td>
                                    <td>
                                 
                               
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-success btn-sm"
                                            data-fil_nom="<?php echo e($filieres_metier->nom); ?>" data-pro_id="<?php echo e($filieres_metier->id); ?>"
                                            data-cat_nom="<?php echo e($filieres_metier->categorie->nom); ?>"
                                            data-code="<?php echo e($filieres_metier->code); ?>" data-toggle="modal"
                                            data-target="#edit_Product">modifier</button>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-danger btn-sm " data-pro_id="<?php echo e($filieres_metier->id); ?>"
                                            data-fil_nom="<?php echo e($filieres_metier->nom); ?>" data-toggle="modal"
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
        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Modifier la filière-métier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='filieres_metiers/update' method="post">
                        <?php echo e(method_field('patch')); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title"> Nom de la filière-métier :</label>

                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                <input type="text" class="form-control" name="fil_nom" id="fil_nom">
                            </div>
                            <div class="form-group">
                                <label for="des">Code :</label>
                                <input type="text"  name="code"  id='code'
                                    class="form-control">
                            </div>
                            <div class="form-group">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Catégorie professionnel</label>
                            <select name="cat_nom" id="cat_nom" class="custom-select my-1 mr-sm-2" required>
                              <?php $__currentLoopData = $categories_professionnels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_professionnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option><?php echo e($categories_professionnel->nom); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Modifier la filière-métier</button>
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
                   <h5 class="modal-title"> Supprimer la filière-métier</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="filieres_metiers/destroy" method="post">
                   <?php echo e(method_field('delete')); ?>

                   <?php echo e(csrf_field()); ?>

                   <div class="modal-body">
                       <p>  Etes vous sur de vouloir supprimer cette filière-métier? </p><br>
                       <input type="hidden" name="pro_id" id="pro_id" value="">
                       <input class="form-control" name="fil_nom" id="fil_nom" type="text" readonly>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- Internal Data tables -->
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
<!--Internal  Datatable js -->
<script src="<?php echo e(URL::asset('assets/js/table-data.js')); ?>"></script>
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<!-- Internal Modal js-->

<script>
    $('#edit_Product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var fil_nom = button.data('fil_nom')
        var cat_nom = button.data('cat_nom')
        var pro_id = button.data('pro_id')
        var code = button.data('code')
        var modal = $(this)
        modal.find('.modal-body #fil_nom').val(fil_nom);
        modal.find('.modal-body #cat_nom').val(cat_nom);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #pro_id').val(pro_id);
    })


    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var fil_nom = button.data('fil_nom')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #fil_nom').val(fil_nom);
    })

    $(document).ready(function() {
    $('#filieres_metiers').DataTable();
} );

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/filieres_metiers/index.blade.php ENDPATH**/ ?>