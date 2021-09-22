<?php $__env->startSection('title', 'Structure des fichiers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="mb-3 text-end">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-warning">Retour</a>
         
            <a href="<?php echo e(route('codesBudgetairesFileUploadGET')); ?>" class="btn btn-primary">Modifier les liens</a>
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
      
            <a href="<?php echo e(route('codesBudgetairesFileUploadGET')); ?>" class="btn btn-primary">Modifier les liens</a>
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
                        label: 'Code Client',
                        field: 'code_client',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Libellé Client',
                        field: 'code_client_verbose',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Abrv. Code Principal',
                        field: 'abrv_cp_bdd',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Libellé Code Principal',
                        field: 'label_cp_bdd',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Abrv. Code Secondaire',
                        field: 'abrv_cs_bdd',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                    {
                        label: 'Libellé Code Secondaire',
                        field: 'label_cs_bdd',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Aucun filtre appliqué', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                    },
                ],
                rows: <?php echo json_encode($correspondances); ?>,
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/testold/Bookone/resources/views/CorrespondanceLigneBudgetaire/review.blade.php ENDPATH**/ ?>