<?php $__env->startSection('css'); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
structures
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
<?php $__env->startSection('title'); ?>
Structures de fichiers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">   Liste des structures des fichiers clients</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-success" href="<?php echo e(route('addFileVariantGET')); ?>">Ajouter</a>
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>

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
        <?php $__empty_1 = true; $__currentLoopData = $file_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file_variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
        <tr>
            <td><?php echo e($file_variant->code); ?></td>
            <td><?php echo e($file_variant->label); ?></td>
            <td><?php echo e($file_variant->typeVerbose()); ?></td>
            <td class="text-end">
                <a class="btn btn-warning" href="<?php echo e(route('editFileVariantGET', ['id' => $file_variant->id])); ?>">Modifier</a>
                <a class="btn btn-danger" href="<?php echo e(route('deleteFileVariantGET', ['id' => $file_variant->id])); ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="100">Aucune variante trouvée</td>
        </tr>
        <?php endif; ?>
    </table>
</div>
</div>
</div>
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


    $(document).ready(function() {
    $('#structures').DataTable();
} );

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/FileVariant/browse.blade.php ENDPATH**/ ?>