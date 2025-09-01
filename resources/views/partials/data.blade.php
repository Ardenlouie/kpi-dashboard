
<div class="card-body">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card small-box bg-purple ">
                <div class="card-header">
                    <div class="inner">
                        <h3><p>BEVI</p></h3>
                        <div class="text-center table-responsive"><i class="sparkline" data-type="line" data-values={{ $beviMonth }}></i></div>
                        <div class="text-center">
                            <h1 class="mobile-only">{{$short($beviTotal, 2, '.', ',')}}</h1>
                            <h1 class="desktop-only">{{number_format($beviTotal, 2, '.', ',')}}</h1>
                        </div>
                        
                        @if($percent_bevi >= 0)
                            <h4 class="description-percentage text-success text-center"><i class="fas fa-caret-up"></i>{{number_format($percent_bevi, 1)}}%</h4>
                        @elseif($percent_bevi < 0)
                            <h4 class="description-percentage text-danger text-center"><i class="fas fa-caret-down"></i> {{number_format($percent_bevi, 1)}}%</h4>
                        @else
                        @endif
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool toggle-card small-box-footer" >
                            More info  <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive" style="display: none;">
                    <h5 class="text-bold text-center">Top Brands Category</h5>
                    <table class="table table-striped">
                        <tbody>
                        @foreach ($beviBrandTotals as $brand => $total)
                            <tr>
                                <td>{{ $brand }}</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="text-bold">Previous Year: {{number_format($prevbeviTotal, 2, '.', ',')}}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="bg-gray color-palette small-box card ">
                <div class="card-header">
                    <div class="inner">
                        <h3><p>BEVA</p></h3>
                        <div class="text-center table-responsive"><i class="sparkline" data-type="line" data-values={{ $bevaMonth }}></i></div>
                        <div class="text-center">
                            <h1 class="mobile-only">{{$short($bevaTotal, 2, '.', ',')}}</h1>
                            <h1 class="desktop-only">{{number_format($bevaTotal, 2, '.', ',')}}</h1>
                        </div>

                        @if($percent_beva >= 0)
                            <h4 class="description-percentage text-success text-center"><i class="fas fa-caret-up"></i>{{number_format($percent_beva, 1)}}%</h4>
                        @elseif($percent_beva < 0)
                            <h4 class="description-percentage text-danger text-center"><i class="fas fa-caret-down"></i> {{number_format($percent_beva, 1)}}%</h4>
                        @else
                        @endif
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool toggle-card small-box-footer" >
                            More info  <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive" style="display: none;">
                    <h5 class="text-bold text-center">Top Brands Category</h5>
                    <table class="table table-striped ">
                        <tbody>
                        @foreach ($bevaBrandTotals as $brand => $total)
                            <tr>
                                <td>{{ $brand }}</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="text-bold">Previous Year: {{number_format($prevbevaTotal, 2, '.', ',')}}</h5>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-lg-3 col-6">
            <div class="bg-yellow small-box card ">
                <div class="card-header">
                    <div class="inner">
                        <h3><p>BIG I</p></h3>
                        <div class="text-center table-responsive"><i class="sparklines" data-type="line" data-values={{ $bigiMonth }}></i></div>
                        <div class="text-center">
                            <h1 class="mobile-only">{{$short($bigiTotal, 2, '.', ',')}}</h1>
                            <h1 class="desktop-only">{{number_format($bigiTotal, 2, '.', ',')}}</h1>
                        </div>

                        @if($percent_bigi >= 0)
                            <h4 class="description-percentage text-success text-center"><i class="fas fa-caret-up"></i>{{number_format($percent_bigi, 1)}}%</h4>
                        @elseif($percent_bigi < 0)
                            <h4 class="description-percentage text-danger text-center"><i class="fas fa-caret-down"></i> {{number_format($percent_bigi, 1)}}%</h4>
                        @else
                        @endif                   
                    </div>
                    <div class="icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool toggle-card small-box-footer" >
                            More info  <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive" style="display: none;">
                    <h5 class="text-bold text-center">Top Brands Category</h5>
                    <table class="table table-striped">
                        <tbody>
                        @foreach ($bigiBrandTotals as $brand => $total)
                            <tr>
                                <td>{{ $brand }}</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="text-bold">Previous Year: {{number_format($prevbigiTotal, 2, '.', ',')}}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="bg-orange small-box card ">
                <div class="card-header">
                    <div class="inner">
                        <h3><p>TOTAL</p></h3>
                        <div class="text-center table-responsive"><i class="sparklines" data-type="line" data-values={{ $allMonth }}></i></div>
                        <div class="text-center">
                            <h1 class="mobile-only">{{$short($allTotal, 2, '.', ',')}}</h1>
                            <h1 class="desktop-only">{{number_format($allTotal, 2, '.', ',')}}</h1>
                        </div>

                        @if($percent_all >= 0)
                            <h4 class="description-percentage text-success text-center"><i class="fas fa-caret-up"></i>{{number_format($percent_all, 1)}}%</h4>
                        @elseif($percent_all < 0)
                            <h4 class="description-percentage text-danger text-center"><i class="fas fa-caret-down"></i> {{number_format($percent_all, 1)}}%</h4>
                        @else
                        @endif                   
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool toggle-card small-box-footer" >
                            More info  <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive" style="display: none;">
                    <h5 class="text-bold text-center">Top Brands Category</h5>
                    <table class="table table-striped">
                        <tbody>
                        @foreach ($allBrandTotals as $brand => $total)
                            <tr>
                                <td>{{ $brand }}</td>
                                <td>{{ number_format($total['actual'], 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="text-bold">Previous Year: {{number_format($prevallTotal, 2, '.', ',')}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Monthly Recap Report</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center"><strong>Sales: {{$datetoday}}</strong></p>
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Brands Sales Progress (Current vs Previous)</strong>
                            </p>
                            @foreach ($allBrandTotals as $brand => $total)
                            @php    
                                $percentBrand = $total['previous'] != 0
                                ? ($total['actual'] / $total['previous']) * 100
                                : 0;

                                $color = 'bg-danger'; // default red
                                if ($percentBrand >= 75) $color = 'bg-purple';
                                elseif ($percentBrand >= 50) $color = 'bg-info';
                                elseif ($percentBrand >= 25) $color = 'bg-warning';
                                
                            @endphp
                            <div class="progress-group">
                                {{$brand}}
                                <span class="float-right"><b>{{$short($total['actual'], 2, '.', ',')}}</b>/{{$short($total['previous'], 2, '.', ',')}}</span>
                                <div class="progress progress-xl">
                                    <div class="progress-bar {{ $color }} text-bold text-md" 
                                        role="progressbar"
                                        style="width: {{ number_format($percentBrand, 2) }}%"
                                        aria-valuenow="{{ $percentBrand }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format($percentBrand, 2) }}%
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <p class="text-center"><strong>Top Accounts</strong></p>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            BEVI
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td>
                                            <div class="p-0" style="display: none;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Accounts</th>
                                                            <th>Total Sales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($beviAccountTotals as $customer => $total)
                                                        <tr>
                                                            <td>{{ $customer }}</td>
                                                            <td>{{ number_format($total, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            BEVA
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td>
                                            <div class="p-0" style="display: none;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Accounts</th>
                                                            <th>Total Sales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($bevaAccountTotals as $customer => $total)
                                                        <tr>
                                                            <td>{{ $customer }}</td>
                                                            <td>{{ number_format($total, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            BIG I
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td>
                                            <div class="p-0" style="display: none;">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Accounts</th>
                                                            <th>Total Sales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($bigiAccountTotals as $customer => $total)
                                                        <tr>
                                                            <td>{{ $customer }}</td>
                                                            <td>{{ number_format($total, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                <h5 class="description-header">₱35,210.43</h5>
                                <span class="description-text">TOTAL REVENUE</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                <h5 class="description-header">₱10,390.90</h5>
                                <span class="description-text">TOTAL COST</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                <h5 class="description-header">₱24,813.53</h5>
                                <span class="description-text">TOTAL PROFIT</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block">
                                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                <h5 class="description-header">1200</h5>
                                <span class="description-text">GOAL COMPLETIONS</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Distribution by Company</h3>
                </div>
                <div class="card-body">
                    <canvas id="salesDonutChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="position: relative; left: 0px; top: 0px;">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-building mr-1"></i>
                        Top Accounts Sales
                    </h3><br>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#bevi-chart" data-toggle="tab">BEVI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#beva-chart" data-toggle="tab">BEVA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bigi-chart" data-toggle="tab">BIG I</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="bevi-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="beva-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="lineChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="bigi-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="lineChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recently Added Brands </h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($newBrandTotals as $brand => $total)
                            <tr>
                                <td>
                                <img src="{{asset('/images/'.$brand.'1.png')}}" alt="Product 1" class="img-square img-size-50 mr-2">
                                {{$brand}} 
                                </td>
                                <td>
                                {{$short($total['actual'], 2, '.', ',')}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
           
        </div>
    </div>
</div>

<script>
    function initChart() {
        // Get the canvas element
        const ctx = document.getElementById('barChart').getContext('2d');
        const dataPoints1 = @json($dataPoints1);
        const dataPoints2 = @json($dataPoints2);
        const dataPoints3 = @json($dataPoints3);
        let chartMode = 'monthly';

        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($dataPoints3),
                datasets: [
                    {
                        type: 'bar',
                        label: '2024', // Dataset label
                        data: dataPoints1, // Data points
                        backgroundColor: [
                            'rgba(147, 147, 147, 1)'
                        ],
                        borderColor: [
                            'rgba(98, 98, 98, 1)'

                        ],
                        borderWidth: 1, // Border width
                        years: '2024',
                        
                    },
                    {
                        type: 'bar',
                        label: '2025', // Dataset label
                        data: dataPoints2, // Data points
                        backgroundColor: [
                            'rgba(125, 0, 214, 1)'

                        ],
                        borderColor: [
                            'rgba(124, 0, 212, 1)'

                        ],
                        borderWidth: 1, 
                        years: '2025',
            
                        
                    },
                ]
            },
            options: {
                responsive: true,
                onClick: function(evt, elements) {               
                    if (elements.length === 0) return;

                    let index = elements[0].index;
                    let datasetIndex = elements[0].datasetIndex;

                    if (chartMode === 'monthly') {
                        let monthIndex = elements[0].index;
                        let datasetIndex = elements[0].datasetIndex;
                        let monthName = this.data.labels[monthIndex];
                        let year = this.data.datasets[datasetIndex].label;
                        let month = new Date(Date.parse(monthName +" 1, 2025")).getMonth() + 1;
                        selectedYear = year;
                        selectedMonth = month;
                        
                        fetch(`/account-data/${month}/${year}`)
                            .then(res => res.json())
                            .then(data => {
                                barChart.data.labels = data.labels;
                                barChart.data.datasets = [{
                                    label: `Account Sales (${monthName} ${year})`,
                                    data: data.values,
                                    backgroundColor: 'rgb(255, 165, 0)',
                                    borderColor: 'rgb(255, 165, 0)',
                                    borderWidth: 1,
                                }];
                                barChart.data.datasets.splice(1, 1)
                                
                                barChart.update();

                                chartMode = 'daily';
                            });
                    } else if (chartMode === 'daily') {
                        // Step 2 → Clicked on a Day
                        let account = this.data.labels[index]; 

                        fetch(`/brand-data/${selectedMonth}/${selectedYear}/${account}`)
                            .then(res => res.json())
                            .then(data => {
                                barChart.data.labels = data.labels;
                                barChart.data.datasets = [{
                                    label: `Brands (${selectedMonth}/${selectedYear} - ${account})`,
                                    data: data.values,
                                    backgroundColor: 'rgba(0, 200, 255, 0.6)',
                                    borderColor: 'rgba(0, 200, 255, 0.6)',
                                    borderWidth: 1
                                }];
                                barChart.update();
                                chartMode = 'detail';
                            });
                    } 
                },
                scales: {
                y: {
                    beginAtZero: true, 
                    display: false
                }
                },
                
                plugins: {
                    legend: {
                        display: true, // Show legend
                        position: 'top'
                    }
                },
                plugins: {
                    chartAreaBackground: {
                        color: 'rgb(37, 5, 5)', // Chart background color
                    }
                }
                }
            });


    const ctxDonut = document.getElementById('salesDonutChart').getContext('2d');

    new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($companyName) !!},  
            datasets: [{
                data: {!! json_encode($companyTotal) !!}, 
                backgroundColor: [
                     '#00c0ef', '#3c8dbc', '#d2d6de'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed;
                            return context.label + ': ₱' + value.toLocaleString();
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 12
                    },
                    formatter: function(value, context) {
                        const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        const percentage = ((value / total) * 100).toFixed(1);
                        return percentage + '%';
                        // Or return '₱' + value.toLocaleString();
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
    $(function () {
        $('.sparkline').each(function () {
            var $this = $(this);
            $this.sparkline(
                $this.data('values').split(','), {
                    type: $this.data('type') || 'line',
                    height: '30',
                    width: '200',
                    lineColor: '#f55a00ff',
                    responsive: true,
                    fillColor: false
                }
            );
        });
    });
    $(function () {
        $('.sparklines').each(function () {
            var $this = $(this);
            $this.sparkline(
                $this.data('values').split(','), {
                    type: $this.data('type') || 'line',
                    height: '30',
                    width: '200',
                    lineColor: '#9300f5ff',
                    responsive: true,
                    fillColor: false
                    
                }
            );
        });
    });
       

        const line = document.getElementById('lineChart').getContext('2d');

        new Chart(line, {
            type: 'line',
            data: {
                labels: {!! json_encode($beviLabels) !!},    // ["Jan", "Feb", ...]
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($beviTotals) !!},     // [10000, 12000, ...]
                    borderColor: '#3c8dbc',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    pointRadius: 8,
                    pointBackgroundColor: 'rgba(52, 136, 225, 0.5)',
                    pointHoverRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₱' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        display: false,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        const line2 = document.getElementById('lineChart2').getContext('2d');

        new Chart(line2, {
            type: 'line',
            data: {
                labels: {!! json_encode($bevaLabels) !!},    // ["Jan", "Feb", ...]
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($bevaTotals) !!},     // [10000, 12000, ...]
                    borderColor: '#00c0ef',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    pointRadius: 8,
                    pointBackgroundColor: 'rgba(5, 202, 247, 0.5)',
                    pointHoverRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₱' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        display: false,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        const line3 = document.getElementById('lineChart3').getContext('2d');

        new Chart(line3, {
            type: 'line',
            data: {
                labels: {!! json_encode($bigiLabels) !!},    // ["Jan", "Feb", ...]
                datasets: [{
                    label: 'Sales',
                    data: {!! json_encode($bigiTotals) !!},     // [10000, 12000, ...]
                    borderColor: '#d2d6de',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    pointRadius: 8,
                    pointBackgroundColor: 'rgba(191, 191, 191, 0.5)',
                    pointHoverRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₱' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        display: false,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
        
    };
</script>


