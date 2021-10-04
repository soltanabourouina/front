<?php $__env->startSection('title', 'Evenements'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
    </div>
    <div class="accordion" id="accordionExample">
    <?php
        $no_employee_list = ["ETABLISSEMENT_CREATE"];
    ?>
    <?php $__currentLoopData = $eventsByMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currentMonthEvents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?php echo e($key); ?>">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($key); ?>">
                <?php echo e(Helpers::getMonthNameFromNumber($currentMonthEvents['period']['month'])); ?> <?php echo e($currentMonthEvents['period']['year']); ?>

            </button>
          </h2>
          <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table">
                    <tr>
                        <th>Intitulé</th>
                        <th>Concerne</th>
                        <th>Ancienne valeure</th>
                        <th>Nouvelle valeure</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    <?php $__currentLoopData = $currentMonthEvents['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->action); ?></td>
                        <?php if(!in_array($event->action, $no_employee_list)): ?>
                        <td><?php echo e($event->employee()->full_name()); ?></td>
                        <?php else: ?>
                        <td></td>
                        <?php endif; ?>
                        <td><?php echo e($event->old); ?></td>
                        <td><?php echo e($event->new); ?></td>
                        <td class="text-end">
                            <a class="btn btn-danger" href="<?php echo e(route('cancelEventGET', ['id' => $event->id])); ?>">Annuler</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
          </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/Events/review.blade.php ENDPATH**/ ?>