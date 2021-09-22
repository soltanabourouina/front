<?php $__env->startSection('title', 'Ajouter une simulation'); ?>

<?php $__env->startSection('content'); ?>
    <div class="w-25 m-auto">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('createSimulationPOST')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
            </div>
            <div class="mb-3 text-end">
                <a href="<?php echo e(route('simulationsGET')); ?>" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary">Ajouter une simulation</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/Simulation/create.blade.php ENDPATH**/ ?>