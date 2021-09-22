<?php $__env->startSection('title', 'Transactions'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
    </div>
    <table class="table">
        <tr>
            <th>Fichier</th>
            <th>Type de transaction</th>
            <th>Date de transaction</th>
            <th class="text-end">Actions</th>
        </tr>
        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <tr>
            <td><?php echo e($transaction->fileName); ?></td>
            <td><?php echo e($transaction->fileType); ?></td>
            <td><?php echo e($transaction->created_at); ?></td>
            <td class="text-end">
                <?php if($transaction->is_latest()): ?>
                <a class="btn btn-danger" href="<?php echo e(route('cancelTransactionGET', ['id' => $transaction->id])); ?>">Annuler</a>
                <?php else: ?>
                <a class="btn btn-secondary " href="#">Annuler</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/browseTransactions.blade.php ENDPATH**/ ?>