<?php $__env->startSection('title', 'Structure des fichiers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="mb-3 text-end">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-warning">Retour</a>
          
            <a href="<?php echo e(route('uploadSpreadsheetColumnStructureGET')); ?>" class="btn btn-primary">Créer une structure de fichier </a>
        </div>
        
        <div id="overview-table">
            <vue-good-table 
            :columns="columns" 
            :rows="rows" 
            :pagination-options="pagination_options"
            />
        </div>
        <div class="mt-3 text-end">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-warning">Retour</a>
           
            <a href="<?php echo e(route('uploadSpreadsheetColumnStructureGET')); ?>" class="btn btn-primary">Créer une structure de fichier</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    const overview = new Vue({
        el: '#overview-table',
        data(){
            return {
                columns: [
                    {
                        label: 'Type',
                        field: 'type_verbose',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Pas de filtre appliqué', // placeholder for filter input
                            filterDropdownItems: <?php echo json_encode($columns->pluck("type_verbose")->unique()->values()->toArray()); ?>, // dropdown (with selected values) instead of text input
                        },
                    },
                    {
                        label: 'Variante',
                        field: 'file_variant_code',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Pas de filtre appliqué', // placeholder for filter input
                            filterDropdownItems: <?php echo json_encode($columns->pluck("file_variant_code")->unique()->values()->toArray()); ?>, // dropdown (with selected values) instead of text input
                        },
                    },
                    {
                        label: 'Champ',
                        field: 'colonne_bdd_verbose',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Pas de filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Colonne dans le fichier',
                        field: 'colonne_client_verbose',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Pas de filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                ],
                rows: <?php echo json_encode($columns); ?>,
                pagination_options: {
                    enabled: true,
                    mode: 'pages',
                    perPage: 10,
                    position: 'bottom',
                    perPageDropdown: [5, 10, 15, 20],
                    dropdownAllowAll: true,
                    nextLabel: 'Suivant',
                    prevLabel: 'Précedent',
                    rowsPerPageLabel: 'Lignes par page',
                    ofLabel: 'sur',
                    pageLabel: 'Page', // for 'pages' mode
                    allLabel: 'Tous',
                }
            };
        },
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/off/Bookone/resources/views/StructureDefinition/review.blade.php ENDPATH**/ ?>