<?php $__env->startSection('title', 'Définir les lignes budgétaires'); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-25 m-auto">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('codesBudgetairesDefinePOST')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="variant">Variante de fichier</label>
                <select name="variant" id="variant" class="form-select">
                    <?php $__currentLoopData = $file_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file_variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($file_variant->code); ?>"><?php echo e($file_variant->label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <input class="form-control" type="file" name="file" id="formFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
            <div class="mb-3 text-end">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-danger">Annuler</a>

                <button type="submit" class="btn btn-primary">Extraire les codes budgétaires</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/CorrespondanceLigneBudgetaire/fileUpload.blade.php ENDPATH**/ ?>