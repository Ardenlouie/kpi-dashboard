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
<style>
    .mobile-only { display: none; }
    .desktop-only { display: inline; }

    @media (max-width: 768px) {
        .mobile-only { display: inline; }
        .desktop-only { display: none; }
    }

    #container {
    height: 800px;
    min-width: 500px;
    max-width: 1000px;
    margin: 0 auto;
    }

    .loading {
        margin-top: 10em;
        text-align: center;
        color: gray;
    }
</style>
@endpush
@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<!-- <script src="{{ asset('vendor/node_modules/chart.js/dist/chart.js') }}"></script>
<script src="{{ asset('vendor/node_modules/chart.js/dist/chart.js.map') }}"></script> -->

<script>
    function fetchDataAndUpdate() {
        $('#loading-spinner').show();

        $.get('{{ route('fetchData') }}', function (data) {
            $('#data-section').html(data);
            initChart();
        }).always(function () {
            $('#loading-spinner').hide();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            
            fetchDataAndUpdate();

            setInterval(fetchDataAndUpdate, 6000000);
        }, 1);
    });
</script>

<script>
    // Ensure the initial state is set to visible with a "minus" icon
    $(document).ready(function() {
        $('.toggle-card').each(function() {
            const cardBody = $(this).closest('.card').find('.card-body');
            cardBody.hide(); // Ensure the card body is visible
            $(this).find('i').addClass('fa-plus').removeClass('fa-minus'); // Set default icon to "minus"
        });
    });

    // Handle the toggle functionality
    $(document).on('click', '.toggle-card', function() {
        const cardBody = $(this).closest('.card').find('.card-body');
        cardBody.toggle(); // Toggle visibility
        $(this).find('i').toggleClass('fa-minus fa-plus'); // Change icon
    });
</script>


@endpush

