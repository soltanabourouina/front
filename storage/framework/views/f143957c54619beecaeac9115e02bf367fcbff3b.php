<?php $__env->startSection('title', 'Simulations'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-6">
            <?php if(isset($budget)): ?>
            <h1 class="h5">Budget :</h1>
            <p class="h4"><?php echo e(Helpers::showMonetaryValue($budget)); ?></p>
            <?php endif; ?>
        </div>
        <div class="text-end py-3 col-6">
            <a class="btn btn-success" href="<?php echo e(route('createSimulationGET')); ?>">Ajouter</a>
            <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
        
        </div>
    </div>
    <table class="table">
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Total Prévu</th>
            <?php if(isset($budget)): ?>
            <th>Delta</th>
            <?php endif; ?>
            <th class="text-end">Actions</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $simulations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simulation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
        <tr>
            <td><?php echo e($simulation->code); ?></td>
            <td><?php echo e($simulation->description); ?></td>
            <td><?php echo e(Helpers::showMonetaryValue($simulation->getTotalOfYear())); ?></td>
            <?php if(isset($budget)): ?>
            <td><?php echo e(Helpers::showMonetaryValue($simulation->getTotalOfYear() - $budget)); ?></td>
            <?php endif; ?>
            <td class="text-end">
                <a class="btn btn-primary my-1" href="<?php echo e(route('createSimulationEventGET', ['id' => $simulation->id])); ?>">Ajouter un évenement</a>
                <a class="btn btn-warning my-1" href="<?php echo e(route('readSimulationGET', ['id' => $simulation->id])); ?>">Détails</a>
                <a class="btn btn-success my-1" href="<?php echo e(route('confirmSimulationGET', ['id' => $simulation->id])); ?>">Confirmer</a>
                <a class="btn btn-danger my-1" href="<?php echo e(route('deleteSimulationGET', ['id' => $simulation->id])); ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="100">Aucune simulation trouvée</td></tr>
        <?php endif; ?>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/Simulation/browse.blade.php ENDPATH**/ ?>