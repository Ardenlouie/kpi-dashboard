
<div class="card-body">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card small-box bg-red">
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
                            <h4 class="description-percentage text-white text-center"><i class="fas fa-caret-down"></i> {{number_format($percent_bevi, 1)}}%</h4>
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
                    <!-- <div class="card-tools">
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
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center"><strong>Sales as of: {{$datetoday}}</strong></p>
                            
                            <div class="chart">
                                <button id="backBtn" style="display:none; margin-bottom:10px;">⬅ Back</button>
                                <!-- <div id="companyBtn" class="card-tools float-right" style="display:none;">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <div class="form-group">
                                                <div>
                                                    <label><input type="checkbox" class="company-filter" value="BEVI" checked> BEVI</label>
                                                    <label><input type="checkbox" class="company-filter" value="BEVA" checked> BEVA</label>
                                                    <label><input type="checkbox" class="company-filter" value="BIGI" checked>  <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option_a3" autocomplete="off"> BEVA
                                    </label></label>
                                                </div>
                                            </div>
                                        </li>
                                  
                                    </ul>
                                </div> -->

                                <div id="companyBtn" class="btn-group btn-group-toggle float-right" data-toggle="buttons" style="display:none;">
                                    <label class="btn btn-primary active">
                                        <input id="allBtn" type="radio" name="options" id="option_a1" autocomplete="off" checked=""> All
                                    </label>
                                    <label class="btn btn-primary">
                                        <input id="beviBtn" type="radio" name="options" id="option_a2" autocomplete="off"> BEVI
                                    </label>
                                    <label class="btn btn-primary">
                                        <input id="bevaBtn" type="radio" name="options" id="option_a3" autocomplete="off"> BEVA
                                    </label>
                                     <label class="btn btn-primary">
                                        <input id="bigiBtn" type="radio" name="options" id="option_a4" autocomplete="off"> BIG I
                                    </label>
                                </div>

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
                                if ($percentBrand >= 75) $color = 'bg-red';
                                elseif ($percentBrand >= 50) $color = 'bg-secondary';
                                elseif ($percentBrand >= 25) $color = 'bg-warning';
                                
                            @endphp
                            <div class="progress-group">
                                <img src="{{asset('/images/'.$brand.'1.png')}}" alt="Product 1" class="img-square img-size-50 mr-2">

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
        <div class="col-md-5">
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
                <div class="card-body" style="max-height: 500px; overflow: auto;">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="bevi-chart" style="position: relative; height: 1000px;">
                            <canvas id="lineChart" style="min-height: 980px; height: 980px; max-height: 980px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="beva-chart" style="position: relative; height: 1000px;">
                            <canvas id="lineChart2" style="min-height: 980px; height: 980px; max-height: 980px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="bigi-chart" style="position: relative; height: 1000px;">
                            <canvas id="lineChart3" style="min-height: 980px; height: 980px; max-height: 980px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div id="container"></div>

                <!-- <div class="card-header">
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
                </div> -->

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
                            'rgba(180, 180, 180, 1)'

                        ],
                        borderWidth: 1, // Border width
                        years: '2024',
                        
                    },
                    {
                        type: 'bar',
                        label: '2025', // Dataset label
                        data: dataPoints2, // Data points
                        backgroundColor: [
                            'rgba(190, 0, 0, 1)'

                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)'

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
                        selectedMonthName = monthName;
                        let selected = [...document.querySelectorAll('.company-filter:checked')]
                            .map(cb => cb.value);

                        let query = selected.map(c => '' + encodeURIComponent(c)).join(',');
                        all = ['BEVI','BEVA','BIG I'];
                        
                        fetch(`/account-data/${month}/${year}/${all}`)
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
                                document.getElementById('backBtn').style.display = 'inline-block';
                                document.getElementById('companyBtn').style.display = 'inline-block';

                             
                            });
                    } else if (chartMode === 'daily') {
                        // Step 2 → Clicked on a Day
                        let account = this.data.labels[index]; 

                        fetch(`/brand-data/${selectedMonth}/${selectedYear}/${account}`)
                            .then(res => res.json())
                            .then(data => {
                                barChart.data.labels = data.labels;
                                barChart.data.datasets = [{
                                    label: `Brands (${selectedMonthName} ${selectedYear} - ${account})`,
                                    data: data.values,
                                    backgroundColor: 'rgba(0, 200, 255, 0.6)',
                                    borderColor: 'rgba(0, 200, 255, 0.6)',
                                    borderWidth: 1
                                }];
                                barChart.update();
                                chartMode = 'detail';
                                document.getElementById('companyBtn').style.display = 'none';

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


            document.getElementById('beviBtn').addEventListener('click', function() {
                fetch(`/account-data/${selectedMonth}/${selectedYear}/BEVI`)
                    .then(res => res.json())
                    .then(data => {
                        barChart.data.labels = data.labels;
                        barChart.data.datasets = [{
                            label: `Account Sales (${selectedMonthName} ${selectedYear})`,
                            data: data.values,
                            backgroundColor: 'rgba(255, 165, 0)',
                            borderColor: 'rgba(255, 165, 0)',
                            borderWidth: 1
                        }];
                        barChart.update();
                    });
            });

            document.getElementById('bevaBtn').addEventListener('click', function() {
                fetch(`/account-data/${selectedMonth}/${selectedYear}/BEVA`)
                    .then(res => res.json())
                    .then(data => {
                        barChart.data.labels = data.labels;
                        barChart.data.datasets = [{
                            label: `Account Sales (${selectedMonthName} ${selectedYear})`,
                            data: data.values,
                            backgroundColor: 'rgba(255, 165, 0)',
                            borderColor: 'rgba(255, 165, 0)',
                            borderWidth: 1
                        }];
                        barChart.update();
                    });
            });

            document.getElementById('bigiBtn').addEventListener('click', function() {
                fetch(`/account-data/${selectedMonth}/${selectedYear}/BIG I`)
                    .then(res => res.json())
                    .then(data => {
                        barChart.data.labels = data.labels;
                        barChart.data.datasets = [{
                            label: `Account Sales (${selectedMonthName} ${selectedYear})`,
                            data: data.values,
                            backgroundColor: 'rgba(255, 165, 0)',
                            borderColor: 'rgba(255, 165, 0)',
                            borderWidth: 1
                        }];
                        barChart.update();
                    });
            });

            document.getElementById('allBtn').addEventListener('click', function() {
                fetch(`/account-data/${selectedMonth}/${selectedYear}/${all}`)
                    .then(res => res.json())
                    .then(data => {
                        barChart.data.labels = data.labels;
                        barChart.data.datasets = [{
                            label: `Account Sales (${selectedMonthName} ${selectedYear})`,
                            data: data.values,
                            backgroundColor: 'rgba(255, 165, 0)',
                            borderColor: 'rgba(255, 165, 0)',
                            borderWidth: 1
                        }];
                        barChart.update();
                    });
            });

            document.getElementById('backBtn').addEventListener('click', function() {
            if (chartMode === 'detail') {
                // Go back to daily
                fetch(`/account-data/${selectedMonth}/${selectedYear}/${all}`)
                    .then(res => res.json())
                    .then(data => {
                        barChart.data.labels = data.labels;
                        barChart.data.datasets = [{
                            label: `Account Sales (${selectedMonthName} ${selectedYear})`,
                            data: data.values,
                            backgroundColor: 'rgba(255, 165, 0)',
                            borderColor: 'rgba(255, 165, 0)',
                            borderWidth: 1
                        }];
                        barChart.update();
                        chartMode = 'daily';
                    });

                document.getElementById('companyBtn').style.display = 'inline-block';
                document.getElementById('allBtn').checked;

            } else if (chartMode === 'daily') {
                // Go back to monthly
                barChart.data.labels = @json($dataPoints3);
                barChart.data.datasets = [
                    {
                        type: 'bar',
                        label: '2024', // Dataset label
                        data: dataPoints1, // Data points
                        backgroundColor: [
                            'rgba(147, 147, 147, 1)'
                        ],
                        borderColor: [
                            'rgba(180, 180, 180, 1)'

                        ],
                        borderWidth: 1, // Border width
                        years: '2024',
                        
                    },
                    {
                        type: 'bar',
                        label: '2025', // Dataset label
                        data: dataPoints2, // Data points
                        backgroundColor: [
                            'rgba(190, 0, 0, 1)'

                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)'

                        ],
                        borderWidth: 1, 
                        years: '2025',
            
                        
                    },
                ];
                barChart.update();
                chartMode = 'monthly';
                this.style.display = 'none';
                document.getElementById('companyBtn').style.display = 'none';

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
                    '#bb0000ff', '#696969ff', '#cbba00ff'
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
                    lineColor: '#ffc800ff',
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
                    lineColor: '#f50000ff',
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
                    borderColor: '#ef0000ff',
                    backgroundColor: 'rgba(255, 0, 0, 0.1)',
                    fill: true,
                    pointRadius: 8,
                    pointBackgroundColor: 'rgba(255, 0, 0, 0.5)',
                    pointHoverRadius: 10
                }]
            },
            
            options: {
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                },
             
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
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                },
             
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
                indexAxis: 'y',
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                },
             
            }
        });

       (async () => {

    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/ph/ph-all.topo.json'
    ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
    const data = [
        ['ph-mn', 0], ['ph-4218', 0], ['TAWI-TAWI', 0], ['ph-bo', @json($bohol)],
        ['ph-cb', @json($ceb)], ['ph-bs', 0], ['ph-2603', 0], ['ph-su', 0],
        ['ph-aq', 0], ['ph-pl', @json($palawan)], ['ph-ro', 0], ['ph-al', @json($albay)],
        ['ph-cs', @json($camsur)], ['ph-6999', 0], ['ph-bn', 0], ['ph-cg', 0],
        ['ph-pn', @json($pangas)], ['ph-bt', @json($batct)], ['ph-mc', 0], ['ph-qz', 0],
        ['ph-es', 0], ['ph-le', @json($leyte)], ['ph-sm', 0], ['ph-ns', 0],
        ['ph-cm', 0], ['ph-di', 0], ['ph-ds', 0], ['ph-6457', 0],
        ['ph-6985', 0], ['ph-ii', 0], ['ph-7017', 0], ['ph-7021', 0],
        ['ph-lg', @json($laguna)], ['ph-ri', @json($rizal)], ['ph-ln', 0], ['ph-6991', 0],
        ['ph-ls', 0], ['ph-nc', 0], ['ph-mg', 0], ['ph-sk', 0],
        ['ph-sc', 0], ['ph-sg', 0], ['ph-an', 0], ['ph-ss', 0],
        ['ph-as', 0], ['ph-do', 0], ['ph-dv', 0], ['ph-bk', 0],
        ['ph-cl', 0], ['ph-6983', 0], ['ph-6984', @json($mandaue)], ['ph-6987', @json($bacld)],
        ['ph-6986', @json($ilo)], ['ph-6988', 0], ['ph-6989', @json($dvo)], ['ph-6990', 0],
        ['ph-6992', @json($cdo)], ['ph-6995', 0], ['ph-6996', 0], ['ph-6997', 0],
        ['ph-6998', 0], ['ph-nv', 0], ['ph-7020', 0], ['ph-7018', 0],
        ['ph-7022', 0], ['ph-1852', 0], ['ph-7000', @json($mn)], ['ph-7001', 0],
        ['ph-7002', 0], ['ph-7003', 0], ['ph-7004', 0], ['ph-7006', @json($qc)],
        ['ph-7007', 0], ['ph-7008', @json($sanj)], ['ph-7009', @json($pasig)], ['ph-7010', @json($makati)],
        ['ph-7011', @json($pasay)], ['ph-7012', @json($paraq)], ['ph-7013', @json($lasp)], ['ph-7014', @json($munlupa)],
        ['ph-7015', @json($taguig)], ['ph-7016', 0], ['ph-7019', @json($lucn)], ['ph-6456', @json($zambg)],
        ['ph-zs', 0], ['ph-nd', 0], ['ph-zn', 0], ['ph-md', 0],
        ['ph-ab', 0], ['ph-2658', 0], ['ph-ap', 0], ['ph-au', 0],
        ['ph-ib', @json($isabela)], ['ph-if', 0], ['ph-mt', 0], ['ph-qr', 0],
        ['ph-ne', 0], ['ph-pm', @json($pampanga)], ['ph-ba', 0], ['ph-bg', 0],
        ['ph-zm', 0], ['ph-cv', @json($cavite)], ['ph-bu', 0], ['ph-mr', 0],
        ['ph-sq', 0], ['ph-gu', 0], ['ph-ct', 0], ['ph-mb', 0],
        ['ph-mq', 0], ['ph-bi', 0], ['ph-sl', 0], ['ph-nr', 0],
        ['ph-ak', 0], ['ph-cp', 0], ['ph-cn', 0], ['ph-sr', 0],
        ['ph-in', @json($ilonor)], ['ph-is', 0], ['ph-tr', @json($tarlac)], ['ph-lu', 0]
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: topology
        },

        title: {
            text: 'Sales Map Chart (Local)'
        },

        subtitle: {
            text: 'Source map: <a href="https://code.highcharts.com/mapdata/countries/ph/ph-all.topo.json">Philippines</a>'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0,
            stops: [
                [0, '#FFFFCC'], // low values → light yellow
                [0.5, '#FD8D3C'], // mid values → orange
                [1, '#800026']  // high values → dark red
            ]
        },

        series: [{
            data: data,
            name: 'Sales',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            }
        }]
    });

})();
        
    };
</script>


