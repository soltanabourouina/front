{{-- @dd($payrolls) --}}
@extends('layouts.master')

@section('title', 'Détails d\'une simulation')

@section('content')
@php
    use App\PayrollRow;
    use App\CodeRegroupementSecondaire;
    use App\BudgetPayrollRow;
    use App\Employe;
@endphp
<div>
    @include('alerts')
    <div class="text-end py-3">
        <a class="btn btn-primary my-1" href="{{ route('createSimulationEventGET', ['id' => $simulation->id]) }}">Ajouter un évenement</a>
        <a class="btn btn-warning my-1" href="{{ route('simulationsGET') }}">Retour</a>
        <a class="btn btn-success my-1" href="{{ route('confirmSimulationGET', ['id' => $simulation->id]) }}">Confirmer</a>
        <a class="btn btn-danger my-1" href="{{ route('deleteSimulationGET', ['id' => $simulation->id]) }}">Supprimer</a>
    </div>
    
    <table class="table w-100 m-auto mb-3">
        <tr>
            <th>Identifiant</th>
            <td class="text-end">{{$simulation->id}}</td>
        </tr>
        <tr>
            <th>Code</th>
            <td class="text-end">{{$simulation->code}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td class="text-end">{{$simulation->description}}</td>
        </tr>
    </table>
    <div id="overview-table">
        <vue-good-table 
        :columns="columns"
        :rows="rows"
        compactMode
        />
    </div>
    <p class="text-muted mt-3 text-end">Valeurs en <span class="fw-bold">K€</span></p>

    <div class="mt-3">
        <h1 class="h3">Détails :</h1>
        <div id="details-table">
            <vue-good-table 
            :columns="columns" 
            :rows="rows" 
            :sort-options="sort_options" 
            :pagination-options="pagination_options"
            />
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    // var overview_unit = 1;
    // $('.overview_unit').on('change', function(e) {
    //     overview_unit = $(this).val();
    // });
    var unit = 1000;
    const overview = new Vue({
        el: '#overview-table',
        data(){
            return {
                columns: [
                    {
                        label: 'Etablissement',
                        field: 'etab',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Filtrer par établissement', // placeholder for filter input
                            filterDropdownItems: {!! json_encode($overview_payrolls->pluck("etab")->unique()->values()->toArray(), JSON_PRETTY_PRINT) !!}, // dropdown (with selected values) instead of text input
                        },
                    },
                    {
                        label: 'Total',
                        field: 'Total',
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Filtrer par montant', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                        formatFn: function(value) {
                            var val = value / 100; // in euro
                            val = val / unit; // in the desired unit
                            return val.toFixed(2);
                        },
                        thClass: 'text-end',
                        tdClass: 'text-end',
                    },
                    @foreach($years_and_months as $year_and_month)
                    {
                        label: {!! "'".$year_and_month["year"]."-".$year_and_month["month"]."'" !!},
                        field: {!! "'".$year_and_month["year"]."-".$year_and_month["month"]."'" !!},
                        filterOptions: {
                            enabled: true, // enable filter for this column
                            placeholder: 'Filtrer par montant', // placeholder for filter input
                            filterValue: '', // initial populated value for this filter
                        },
                        formatFn: function(value) {
                            var val = value / 100; // in euro
                            val = val / unit; // in the desired unit
                            return val.toFixed(2);
                        },
                        thClass: 'text-end',
                        tdClass: 'text-end',
                    },
                    @endforeach    
                ],
                rows: {!! json_encode($overview_payrolls) !!},
            };
        },
    });
    const details = new Vue({
        el: '#details-table',
        data(){
            return {
                columns: [
                    {
                    label: 'Etablissement',
                    field: 'etab',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par établissement', // placeholder for filter input
                        filterDropdownItems: {!! json_encode($returned_payrolls->pluck("etab")->unique()->values()->toArray()) !!}, // dropdown (with selected values) instead of text input
                    },
                    },
                    {
                    label: 'Année',
                    field: 'year',
                    type: 'number',
                    width: '86px',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par année', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'Mois',
                    field: 'month',
                    type: 'number',
                    width: '86px',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par mois', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'Réference',
                    field: 'employee_ref',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par réference', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'Nom et prénom',
                    field: 'employee_name',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par nom', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'CSP',
                    field: 'employee_csp',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par CSP', // placeholder for filter input
                        filterDropdownItems: {!! json_encode($returned_payrolls->pluck("employee_csp")->unique()->values()->toArray()) !!}, // dropdown (with selected values) instead of text input
                    },
                    },
                    {
                    label: 'Coefficient',
                    field: 'employee_coef',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par coef.', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'Code regroupement',
                    field: 'code_regroupement_secondaire',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par code budgétaire', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    },
                    {
                    label: 'Montant',
                    field: 'amount',
                    filterOptions: {
                        enabled: true, // enable filter for this column
                        placeholder: 'Filtrer par montant', // placeholder for filter input
                        filterValue: '', // initial populated value for this filter
                    },
                    formatFn: function(value) {
                        var val = value / 100;
                        return val.toFixed(2) + " €";
                    },
                    tdClass: 'text-end',
                    },
                ],
                rows: {!! json_encode($returned_payrolls) !!},
                sort_options: {
                    enabled: true,
                    multipleColumns: true,
                    initialSortBy: [
                        {field: 'year', type: 'desc'},
                        {field: 'month', type: 'desc'}
                    ],
                },
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