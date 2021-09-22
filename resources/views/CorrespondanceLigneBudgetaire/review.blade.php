@extends('layouts.master')

@section('title', 'Structure des fichiers')

@section('content')
    <div class="container">
        @include('alerts')
        <div class="mb-3 text-end">
            <a href="{{route('home')}}" class="btn btn-warning">Retour</a>
         
            <a href="{{route('codesBudgetairesFileUploadGET')}}" class="btn btn-primary">Modifier les liens</a>
        </div>
        
        <div id="overview-table">
            <vue-good-table 
            :columns="columns" 
            :rows="rows" 
            :pagination-options="pagination_options"
            />
        </div>
        
        <div class="mt-3 text-end">
            <a href="{{route('home')}}" class="btn btn-warning">Retour</a>
      
            <a href="{{route('codesBudgetairesFileUploadGET')}}" class="btn btn-primary">Modifier les liens</a>
        </div>
    </div>
@stop

@section('js')
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
                rows: {!! json_encode($correspondances) !!},
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
@stop