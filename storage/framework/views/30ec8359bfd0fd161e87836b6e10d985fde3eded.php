<?php $__env->startSection('title', 'Lignes budgétaires d\'un fichier'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('saveCodesBudgetairesPOST')); ?>" method="POST" class="container">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo csrf_field(); ?>
        <div class="mb-3 text-end">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-warning">Retour</a>
          
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
        <input type="hidden" name="variant" value="<?php echo e($variant); ?>">
        <table class="w-100">
            <tr>
                <th>Code rubrique</th>
                <th>Intitulé rubrique</th>
                <th>Regroupement principal</th>
                <th>Regroupement secondaire</th>
            </tr>
            <?php $__currentLoopData = $planPaye; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planPayeRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($planPayeRow->code_rubrique); ?></td>    
                <td><?php echo e($planPayeRow->intitule_rubrique); ?></td>   
                <td class="pe-1">
                    <select name="principal_<?php echo e($loop->index); ?>" id="principal_<?php echo e($loop->index); ?>" class="form-select principal">
                        <option value="0" data-secondaire="0" selected>Selectionner un regroupement principal</option>
                        <?php $__currentLoopData = $codes_principales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code_principal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($code_principal->id); ?>" data-secondaire="<?php echo e($code_principal->codesSecondaires()->first()->id); ?>"><?php echo e($code_principal->abreviation); ?> : <?php echo e($code_principal->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>   
                <td>
                    <select disabled name="secondaire_<?php echo e($loop->index); ?>" id="secondaire_<?php echo e($loop->index); ?>" class="form-select secondaire">
                        <option value="0" selected>Selectionner d'abord un regroupement principal</option>
                        <?php $__currentLoopData = $codes_secondaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code_secondaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($code_secondaire->id); ?>" data-principal="<?php echo e($code_secondaire->codePrincipal()->id); ?>"><?php echo e($code_secondaire->abreviation); ?> : <?php echo e($code_secondaire->libelle_secondaire); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="mt-3 text-end">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-warning">Retour</a>
           
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>

    <script>
        $('.principal').on('change', function(e) {
            let index = $(this).attr('id');
            index = index.replace('principal_','');
            let selector = $(this).val();
            if (selector == 0) {
                $("#secondaire_" + index).prop('disabled', true);
                $("#secondaire_" + index).val($(this).find("option:selected").data('secondaire'));
            } else {
                $("#secondaire_" + index).prop('disabled', false);
                $("#secondaire_" + index + " > option").hide();
                $("#secondaire_" + index + " > option").filter(function(){return $(this).data('principal') == selector}).show();
            }
            $("#secondaire_" + index).val($(this).find("option:selected").data('secondaire'));
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/CorrespondanceLigneBudgetaire/form.blade.php ENDPATH**/ ?>