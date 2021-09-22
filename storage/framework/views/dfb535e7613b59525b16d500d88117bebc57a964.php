<?php $__env->startSection('css'); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
Evènements
<?php $__env->stopSection(); ?>
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Liste des Evènements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Evènements</span>
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
        <div class="modal-header ">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un Evènement</h5>
            <button type="button" class="btn btn-info close"  data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="<?php echo e(route('postesdepense.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               
                <div class="form-group">
                    <label for="annee"> Année*</label>
                    <input type="number" maxlength="4" minlength="4" class="form-control" id="annee" name="annee" required>
                </div>
                <div class="form-group">
                    <label for="mois"> Mois *</label>
                    <input type="number" min="1"
                     max="12" class="form-control" id="mois" name="mois" required>
                </div>
            </div>
           





            <div class="form-group" >
                <label class="form-label">Type d'évenement</label>
                <select class="events form-select col-lg-12" name="events[]" multiple>
                    <option value="one">CSP</option>
                    <option value="two">Coef</option>
                    <option value="three">Date de Sortie</option>
                    <option value="four">Date d'entrée</option>
                    <option value="five">Type contrat</option>
                    <option value="six">Higher</option>
                    <option value="seven">Coef horaire</option>
                    <option value="eight">V-niveau classification</option>
                    <option value="nine">code emploi</option>
                    <option value="ten">libelle emploi</option>
                    <option value="eleven">Bonus</option>
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
                                <div
                                class="col-md-6">
									<a class="modal-effect btn btn-outline-primary " data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter de l'évènement</a>
							
                                        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
                                    </div>
                                        <?php endif; ?>
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="postedepense" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
								<th>libelle </th>
                                <th>code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $postedepenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $postedepense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($postedepense->libelle); ?></td>
                                    <td><?php echo e($postedepense->code); ?></td>
									
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-success btn-sm"
                                            data-libelle="<?php echo e($postedepense->libelle); ?>" data-pro_id="<?php echo e($postedepense->id); ?>"
                                            data-code="<?php echo e($postedepense->code); ?>" data-toggle="modal"
                                            data-target="#edit_Product">modifier</button>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                        <button class="btn btn-outline-danger btn-sm " data-pro_id="<?php echo e($postedepense->id); ?>"
                                            data-libelle="<?php echo e($postedepense->libelle); ?>" data-toggle="modal"
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
         <form action='postesdepense/update' method="post">
             <?php echo e(method_field('patch')); ?>

             <?php echo e(csrf_field()); ?>

             <div class="modal-body">

                 <div class="form-group">
                     <label for="title"> Libelle de l'évènnement :</label>

                     <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                     <input type="text" class="form-control" name="libelle" id="libelle">
                 </div>
                 <div class="form-group">
                     <label for="code">code :</label>
                     <input type="text"  name="code"  id='code'
                         class="form-control">
                 </div>
               
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary"> Modifier l'évènnement</button>
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
        <h5 class="modal-title"> Supprimer un évènnement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="postesdepense/destroy" method="post">
        <?php echo e(method_field('delete')); ?>

        <?php echo e(csrf_field()); ?>

        <div class="modal-body">
            <p>  Etes vous sur de vouloir supprimer cet évènnement? </p><br>
            <input type="hidden" name="pro_id" id="pro_id" value="">
            <input class="form-control" name="libelle" id="etab_nom" type="text" readonly>
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

<script src="<?php echo e(URL::asset('assets/js/modal.js')); ?>"></script>
<!--Internal  Notify js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<script>
	$(document).ready(function() {
    $('#postedepense').DataTable();
} );

</script>
<script>
    $('#edit_Product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var libelle = button.data('libelle')
        var pro_id = button.data('pro_id')
        var code = button.data('code')
        var modal = $(this)
        modal.find('.modal-body #libelle').val(libelle);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #pro_id').val(pro_id);
    })


    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var libelle = button.data('libelle')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #libelle').val(libelle);
    })



</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.events').select2();
    });

    $('body').on('click', '.add-data', function (event) {
        event.preventDefault();
        var name = $('input[name=name]').val();
        var events = $('.events').val();
        $.ajax({
            method: 'POST',
            url: './database/db.php',
            data: {
                name: name,
                events: events,
            },
            success: function (data) {
                console.log(data);
                $('.res-msg').css('display', 'block');
                $('.alert-success').text(data).show();
                $('input[name=name]').val('');
                $(".events").val('').trigger('change');

                setTimeout(function () {
                    $('.alert-success').hide();
                }, 3500);


            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/postesdepense/index.blade.php ENDPATH**/ ?>