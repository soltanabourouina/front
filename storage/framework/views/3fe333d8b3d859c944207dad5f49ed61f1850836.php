<?php $__env->startSection('title', 'Ajouter une variante de fichier'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-25 m-auto">
   
    <form action="<?php echo e(route("addFileVariantPOST")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Code">
        </div>
        <div class="form-group mb-3">
            <label for="label">Libelle</label>
            <input type="text" class="form-control" name="label" id="label" placeholder="Libelle">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            <select class="form-control" name="type" id="type">
                <option value="1">Fichier de personnel</option>
                <option value="2">Fichier de paie</option>
                <option value="3">Fichier de plan de paie</option>
            </select>
        </div>
        <div class="text-end">
            <a href="<?php echo e(route('browseFileVariantsGET')); ?>" class="btn btn-danger">Annuler</a>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/FileVariant/add.blade.php ENDPATH**/ ?>