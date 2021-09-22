@extends('layouts.master')

@section('title', 'Définir la structure d\'un fichier')

@section('content')
    <div class="w-25 m-auto">
        @include('alerts')
        <form action="{{ route('uploadSpreadsheetColumnStructurePOST') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="type">Type de fichier</label>
                <select name="type" id="type" class="form-select type">
                    <option value="1" data-variant="{{ isset($file_variants_grouped_by_type["1"]) ? $file_variants_grouped_by_type["1"]->first()->code : 0 }}" selected>Fichier de personnel</option>
                    <option value="2" data-variant="{{ isset($file_variants_grouped_by_type["2"]) ? $file_variants_grouped_by_type["2"]->first()->code : 0 }}">Fichier de paie</option>
                    <option value="3" data-variant="{{ isset($file_variants_grouped_by_type["3"]) ? $file_variants_grouped_by_type["3"]->first()->code : 0 }}">Fichier de plan de paie</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="variant">Variante de fichier</label>
                <select name="variant" id="variant" class="form-select">
                    @php
                        $display_none = "style=\"display: none;\""
                    @endphp
                    @foreach ($file_variants_grouped_by_type as $type => $file_variants_selected_by_type)
                    @foreach ($file_variants_selected_by_type as $file_variant)
                    <option data-type="{{$type}}" value="{{$file_variant->code}}" @if ($type != 1) {!!$display_none!!} @endif>{{$file_variant->label}}</option>
                    @endforeach
                    @endforeach
                    <option value="0" @if (!isset($file_variants_grouped_by_type["1"])) selected @endif>Ajouter une variante</option>
                </select>
            </div>
            <div class="d-none selector-group" id="group-add-file-variant">
                <div class="form-group mb-3">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="Code">
                </div>
                <div class="form-group mb-3">
                    <label for="label">Libelle</label>
                    <input type="text" class="form-control" name="label" id="label" placeholder="Libelle">
                </div>
            </div>
            <div class="form-group mb-3">
                <input class="form-control" type="file" name="file" id="formFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
            <div class="mb-3 text-end">
                <a href="{{route('home')}}" class="btn btn-danger">Annuler</a>
            
                <button type="submit" class="btn btn-primary">Analyser le fichier</button>
            </div>
        </form>
    </div>

    <script>
        $('.type').on('change', function(e) {
            let selector = $(this).val();
            $("#variant" + " > option").hide();
            $("#variant" + " > option").filter(function(){return $(this).data('type') == selector || $(this).val() == 0}).show();
            $("#variant").val($(this).find("option:selected").data('variant'));
            $(".selector-group").addClass("d-none");
            switch ($("#variant").val()) {
                case "0":
                    $("#group-add-file-variant").removeClass("d-none");
                    break;
                default:
                    break;
            }
        });
        if($('#variant').val() == 0) {
            $("#group-add-file-variant").removeClass("d-none");
        };
        $('#variant').on('change', function(e) {
            let selector = $(this).val();
            $(".selector-group").addClass("d-none");
            switch (selector) {
                case "0":
                    $("#group-add-file-variant").removeClass("d-none");
                    break;
                default:
                    break;
            }
        });
    </script>
@stop