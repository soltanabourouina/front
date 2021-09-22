@extends('layouts.master')

@section('title', 'Télécharer un fichier')

@section('content')
<div class="w-25 m-auto">
    @include('alerts')
    <form action="{{ route('uploadFilesPOST') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            <select name="type" id="type" class="form-select type">
                @if (isset($file_variants_grouped_by_type["1"]))
                <option value="1" data-variant="{{ $file_variants_grouped_by_type["1"]->first()->code }}">Fichier de personnel</option>
                @endif
                @if (isset($file_variants_grouped_by_type["2"]))
                <option value="2" data-variant="{{ $file_variants_grouped_by_type["2"]->first()->code }}">Fichier de paie</option>
                @endif
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="variant">Variante de fichier</label>
            <select name="variant" id="variant" class="form-select">
                @foreach ($file_variants_grouped_by_type as $type => $file_variants_selected_by_type)
                @foreach ($file_variants_selected_by_type as $file_variant)
                <option data-type="{{$type}}" value="{{$file_variant->code}}">{{$file_variant->label}}</option>
                @endforeach
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="type">Année et mois</label>
            @php
                $now = \Carbon\Carbon::now();
                $year = $now->format("Y");
                $month = $now->format("m");
            @endphp
            <select name="year" id="year" class="form-select">
                @for ($i = $year - 5; $i <= $year + 5; $i++)
                    <option @if($i == $year) selected @endif value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select name="month" id="month" class="form-select">
                @for ($i = 1; $i <= 12; $i++)
                    <option @if($i == $month) selected @endif value="{{$i}}">{{$i}}</option>
                @endfor
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
@stop