<div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-gradient-orange text-white">
                    <span class="info-box-icon elevation-1"><i class="fas fa-file-invoice"></i></span>
                    <div class="info-box-content">
                        <h3 class="info-box-text text-right">Invoice Amount</h3>
                        <h3 class="info-box-number text-right">{{number_format($invoicedTotal, 2, '.', ',')}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-gradient-yellow text-white">
                    <span class="info-box-icon elevation-1"><i class="fas fa-clock"></i></span>
                    <div class="info-box-content">
                        <h3 class="info-box-text text-right">Pending Amount</h3>
                        <h3 class="info-box-number text-right">{{number_format($pendingTotal, 2, '.', ',')}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-gradient-secondary text-white">
                    <span class="info-box-icon elevation-1"><i class="fas fa-backward"></i></span>
                    <div class="info-box-content">
                        <h3 class="info-box-text text-right">Backlog Amount</h3>
                        <h3 class="info-box-number text-right">{{number_format($backlogTotal, 2, '.', ',')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Company Sales</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
        
                            <li class="nav-item">
                                <a class="nav-link" href="#bevi-chart" data-toggle="tab">BEVI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#beva-chart" data-toggle="tab">BEVA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#prev-chart" data-toggle="tab">2024</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#curr-chart" data-toggle="tab">2025</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
         
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane" id="bevi-chart" style="position: relative; height: 500px;">
                            <canvas id="lineChart" style="min-height: 480px; height: 480px; max-height: 480px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="beva-chart" style="position: relative; height: 500px;">
                            <canvas id="lineChart2" style="min-height: 480px; height: 480px; max-height: 480px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="prev-chart" style="position: relative; height: 500px;">
                            <canvas id="barChart2" style="min-height: 480px; height: 480px; max-height: 480px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane active" id="curr-chart" style="position: relative; height: 500px;">
                            <canvas id="barChart" style="min-height: 480px; height: 480px; max-height: 480px; max-width: 100%;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h3 class="description-header">{{number_format($beviTotal, 2, '.', ',')}}</h3>
                                <span class="description-text">BEVI</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h3 class="description-header">{{number_format($bevaTotal, 2, '.', ',')}}</h3>
                                <span class="description-text">BEVA</span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h3 class="description-header">{{number_format($totalAll, 2, '.', ',')}}</h3>
                                <span class="description-text">TOTAL</span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Sales</h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
        
                            <li class="nav-item">
                                <a class="nav-link active" href="#sku-chart" data-toggle="tab">SKU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#case-chart" data-toggle="tab">CASE</a>
                            </li>
                
                           
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="chart tab-pane active" id="sku-chart" >
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="chart tab-pane" id="case-chart">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<div>

<script>
    function initChartNew() {
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
                        label: 'Monthly Sales (Year 2025)', // Dataset label
                        data: dataPoints2, // Data points
                        backgroundColor: [
                            'rgb(255, 165, 0)'
                        ],
                        borderColor: [
                            'rgb(255, 165, 0)'
                        ],
                        borderWidth: 1, 
                        years: '2025',
            
                        
                    },
                ]
            },
            options: {
                responsive: true,
                onClick: function(evt, elements) {               
                    if (chartMode === 'daily') return; 

                    if (elements.length > 0) {
                        let monthIndex = elements[0].index;
                        let month = this.data.labels[monthIndex];
                        let year = this.data.datasets[0].years;
                        
                        fetch(`/daily-data/${month}/${year}`)
                            .then(res => res.json())
                            .then(data => {
                                barChart.data.labels = data.labels;
                                barChart.data.datasets[0].data = data.values;
                                barChart.data.datasets[0].label = `Daily Sales (Month ${month})`;
                                barChart.update();

                                chartMode = 'daily';
                            });
                    }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const bar2 = document.getElementById('barChart2').getContext('2d');
       
        const barChart2 = new Chart(bar2, {
            type: 'bar',
            data: {
                labels: @json($dataPoints3),
                datasets: [
                    {
                        type: 'bar',
                        label: 'Monthly Sales (Year 2024)', // Dataset label
                        data: dataPoints1, // Data points
                        backgroundColor: [
                            'rgba(96, 94, 90, 1)'
                        ],
                        borderColor: [
                            'rgba(96, 94, 90, 1)'
                        ],
                        borderWidth: 1, 
                        years: '2024',
            
                        
                    },
                ]
            },
            options: {
                responsive: true,
                onClick: function(evt, elements) {

                    if (chartMode === 'daily') return; 

                    if (elements.length > 0) {
                        let monthIndex = elements[0].index;
                        let month = this.data.labels[monthIndex];
                        let year = this.data.datasets[0].years;
                       
                        
                        fetch(`/daily-data/${month}/${year}`)
                            .then(res => res.json())
                            .then(data => {
                                barChart2.data.labels = data.labels;
                                barChart2.data.datasets[0].data = data.values;
                                barChart2.data.datasets[0].label = `Daily Sales (Month ${month})`;
                                barChart2.update();

                                chartMode = 'daily';
                            });
                    }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        

        const line = document.getElementById('lineChart').getContext('2d');

        new Chart(line, {
            type: 'bar',
           
            data: {
                labels: @json($bevilabels),
                datasets: [
                    {
                    label: '2024',
                    data: @json($prevbevidatas),
                    backgroundColor: 'rgba(60,141,188,0.8)',
                    hidden: true

                    },
                    {
                    label: '2025',
                    data: @json($bevidatas), 
                    backgroundColor: 'rgb(255, 165, 0)',
                    
                    },
                ]
                
            },
 
            options: {
                indexAxis: 'y', // <-- key for horizontal
                responsive: true,
                plugins: {
                    legend: { display: true }
                }
            }
        });


        const line2 = document.getElementById('lineChart2').getContext('2d');

        new Chart(line2, {
            type: 'bar',
           
            data: {
                labels: @json($bevalabels),
                datasets: [
                    {
                    label: '2024',
                    data: @json($prevbevadatas),
                    backgroundColor: 'rgba(60,141,188,0.8)',
                    hidden: true

                    },
                    {
                    label: '2025',
                    data: @json($bevadatas), 
                    backgroundColor: 'rgb(255, 165, 0)',
                    
                    },
                ]
            },
 
            options: {
                indexAxis: 'y', // <-- key for horizontal
                responsive: true,
                plugins: {
                    legend: { display: true }
                }
            }
        });

        const pie = document.getElementById('pieChart').getContext('2d');

        new Chart(pie, {
            type: 'pie',
            data: {
                labels: @json($skulabels),
                datasets: [
                    {
                        data: @json($skudatas),
                        backgroundColor: [
                            '#f56954', 
                            '#00a65a', 
                            '#f39c12', 
                            '#00c0ef', 
                            '#3c8dbc', 
                            '#d2d6de',
                            '#8a9400ff',
                            '#d000ffff'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        color: '#fff',   // text color
                        formatter: (value, ctx) => {
                            // show both label and value
                            let label = ctx.chart.data.labels[ctx.dataIndex];
                            // return label + '\n' + value;
                            
                            // OR if you prefer percentage only:
                            let total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = (value / total * 100).toFixed(1) + "%";
                            return label + '\n' + percentage;
                        },
                        font: {
                            size: 10
                        },
                        textAlign: 'center'
                    }
                }
            },
            plugins: [ChartDataLabels] 
        });

        const doughnut = document.getElementById('doughnutChart').getContext('2d');

        new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: @json($brandlabels),
                datasets: [
                    {
                        data: @json($branddatas),
                        backgroundColor: [
                            '#00b345ff', 
                            '#ff00aaff', 
                            '#f39c12', 
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        color: '#fff',   // text color
                        formatter: (value, ctx) => {
                            // show both label and value
                            let label = ctx.chart.data.labels[ctx.dataIndex];
                            // return label + '\n' + value;
                            
                            // OR if you prefer percentage only:
                            let total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = (value / total * 100).toFixed(1) + "%";
                            let cases = value.toFixed(2) + " Cases";

                            return label + '\n' + cases + '\n' + percentage;
                        },
                        font: {
                            weight: 'bold',
                            size: 10
                        },
                        textAlign: 'center'
                    }
                }
            },
            plugins: [ChartDataLabels] // 👈 register the plugin
        });


        
    }
</script>