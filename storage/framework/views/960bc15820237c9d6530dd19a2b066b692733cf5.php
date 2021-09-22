<?php $__env->startSection('title', 'Variantes de fichiers'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-success" href="<?php echo e(route('addFileVariantGET')); ?>">Ajouter</a>
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>

    </div>
    <table class="table">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/FileVariant/browse.blade.php ENDPATH**/ ?>