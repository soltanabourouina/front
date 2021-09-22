<?php $__env->startSection('title', 'Définir la structure d\'un fichier'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('saveSpreadsheetColumnStructureDefinition')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="colCount" value="<?php echo e(count($lines->first())); ?>">
    <input type="hidden" name="type" value="<?php echo e($type); ?>">
    <input type="hidden" name="variant" value="<?php echo e($variant); ?>">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
      
        <button type="submit" class="btn btn-primary">Valider et enregister la structure</button>
    </div>
    <table class="table">
        <?php $__currentLoopData = $lines->first(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column => $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="min-width: 150px">
                <select class="form-select" name="<?php echo e($column); ?>">
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->name_bdd); ?>"><?php echo e($c->name_verbose); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <input type="hidden" name="verbose_<?php echo e($column); ?>" value="<?php echo e(($lines->first())[$column]); ?>">
            </td>
            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $line; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c => $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($c == $column): ?>
            <td><?php echo e($cell); ?></td>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td>...</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
       
        <button type="submit" class="btn btn-primary">Valider et enregister la structure</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/StructureDefinition/structureDefinition.blade.php ENDPATH**/ ?>