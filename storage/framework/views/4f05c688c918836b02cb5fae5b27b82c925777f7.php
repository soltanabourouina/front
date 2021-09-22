<?php if(Session::get('success')): ?>
<div class="alert alert-success">
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <?php echo e($errors->first()); ?>

</div>      
<?php endif; ?>
<?php if(Session::get('warning')): ?>
<div class="alert alert-warning">
    <?php echo e(Session::get('warning')); ?>

</div>
<?php endif; ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/alerts.blade.php ENDPATH**/ ?>