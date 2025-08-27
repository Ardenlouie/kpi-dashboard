@extends('layouts.app')

@section('content_body')

    <div id="loading-spinner" class="text-center mt-3" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden"></span>
        </div>
        Refreshing Data
    </div>

    <div id="data-section"></div>
    
@stop
@push('css')


@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


<script>
    function fetchDataAndUpdate() {
        $('#loading-spinner').show();

        $.get('{{ route('newProduct') }}', function (data) {
            $('#data-section').html(data);
            initChartNew();
        }).always(function () {
            $('#loading-spinner').hide();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            
            fetchDataAndUpdate();

            setInterval(fetchDataAndUpdate, 60000);
        }, 1);
    });
</script>
@endpush


