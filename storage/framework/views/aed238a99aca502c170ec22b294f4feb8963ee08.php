<?php $__env->startSection('title', 'Télécharer un fichier'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-25 m-auto">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('uploadFilesPOST')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            <select name="type" id="type" class="form-select type">
                <?php if(isset($file_variants_grouped_by_type["1"])): ?>
                <option value="1" data-variant="<?php echo e($file_variants_grouped_by_type["1"]->first()->code); ?>">Fichier de personnel</option>
                <?php endif; ?>
                <?php if(isset($file_variants_grouped_by_type["2"])): ?>
                <option value="2" data-variant="<?php echo e($file_variants_grouped_by_type["2"]->first()->code); ?>">Fichier de paie</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="variant">Variante de fichier</label>
            <select name="variant" id="variant" class="form-select">
                <?php $__currentLoopData = $file_variants_grouped_by_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $file_variants_selected_by_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $file_variants_selected_by_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file_variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-type="<?php echo e($type); ?>" value="<?php echo e($file_variant->code); ?>"><?php echo e($file_variant->label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="type">Année et mois</label>
            <?php
                $now = \Carbon\Carbon::now();
                $year = $now->format("Y");
                $month = $now->format("m");
            ?>
            <select name="year" id="year" class="form-select">
                <?php for($i = $year - 5; $i <= $year + 5; $i++): ?>
                    <option <?php if($i == $year): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
            <select name="month" id="month" class="form-select">
                <?php for($i = 1; $i <= 12; $i++): ?>
                    <option <?php if($i == $month): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <input class="form-control" type="file" name="file" id="formFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-primary">Télécharer le fichier</button>
        </div>
    </form>
</div>

<script>
    function refreshVariants(type) {
        $("#variant" + " > option").hide();
        $("#variant" + " > option").filter(function(){return $(this).data('type') == $(type).val() || $(this).val() == 0}).show();
        $("#variant").val($(type).find("option:selected").data('variant'));
    }
    refreshVariants("#type");
    $('.type').on('change', function(e) {
        refreshVariants(this);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/fileUploadForm.blade.php ENDPATH**/ ?>