<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
Categories professionnels
<?php $__env->stopSection(); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />

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
            <h4 class="content-title mb-0 my-auto">Categories professionnels</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des Categories professionnels</span>
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
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter une categorie professionnel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo e(route('categories_professionnel.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               
                <div class="form-group">
                    <label for="nom"> Nom de la catégorie *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="code"> Code*</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div> 
                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6">
                        <label class="form-label"> Status</label>
                        <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="Cadre">Cadre</option>
                            <option value="Non Cadre">Non Cadre </option>
                        </select>
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
										data-toggle="modal" href="#exampleModal"> Ajouter une categorie professionnel</a>
								<?php endif; ?>
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
								<th>categorie professionnel </th>
                                <th>code </th>
                                <th>Status </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = $categories_professionnel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categories_professionnel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($categories_professionnel->nom); ?></td>
                                    <td><?php echo e($categories_professionnel->code); ?></td>
                                    <td>
                                        <?php if($categories_professionnel->Status == 'Cadre'): ?>
                                            <span class="label text-primary ">
                                           <?php echo e($categories_professionnel->Status); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="label text-info ">
                                                <?php echo e($categories_professionnel->Status); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                 
                               
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-success btn-sm"
                                            data-cat_nom="<?php echo e($categories_professionnel->nom); ?>" data-pro_id="<?php echo e($categories_professionnel->id); ?>"
                                            data-code="<?php echo e($categories_professionnel->code); ?>"
                                            data-Status="<?php echo e($categories_professionnel->Status); ?>" data-toggle="modal"
                                            data-target="#edit_Product">modifier</button>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-danger btn-sm " data-pro_id="<?php echo e($categories_professionnel->id); ?>"
                                            data-cat_nom="<?php echo e($categories_professionnel->nom); ?>" data-toggle="modal"
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
                        <h5 class="modal-title" id="exampleModalLabel"> Modifier la categorie professionnel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='categories_professionnel/update' method="post">
                        <?php echo e(method_field('patch')); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title"> Nom de la categorie professionnel :</label>

                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                <input type="text" class="form-control" name="cat_nom" id="cat_nom">
                            </div>
                            <div class="form-group">
                                <label for="des">Code :</label>
                                <input type="text"  name="code"  id='code'
                                    class="form-control">
                                </div>
                            
                            <div class="form-group">
                          
                            <label class="form-label"> Status</label>
                            <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                <option value="Cadre">Cadre</option>
                                <option value="Non Cadre">Non Cadre </option>
                            </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> Modifier la Catégorie professionnel</button>
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
                   <h5 class="modal-title"> Supprimer une categorie professionnel</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <form action="categories_professionnel/destroy" method="post">
                   <?php echo e(method_field('delete')); ?>

                   <?php echo e(csrf_field()); ?>

                   <div class="modal-body">
                       <p>  Etes vous sur de vouloir supprimer cet categorie professionnel? </p><br>
                       <input type="hidden" name="pro_id" id="pro_id" value="">
                       <input class="form-control" name="cat_nom" id="cat_nom" type="text" readonly>
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
<script src="<?php echo e(URL::asset('assets/js/modal.js')); ?>"></script>
<!-- Internal Modal js-->

<script>
    $('#edit_Product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var cat_nom = button.data('cat_nom')
        var pro_id = button.data('pro_id')
        var code = button.data('code')
        var Status =button.data('Status')
        var modal = $(this)
        modal.find('.modal-body #cat_nom').val(cat_nom);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #Status').val(Status);
        modal.find('.modal-body #pro_id').val(pro_id);
    })


    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var cat_nom = button.data('cat_nom')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #cat_nom').val(cat_nom);
    })


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/categories_professionnel/index.blade.php ENDPATH**/ ?>