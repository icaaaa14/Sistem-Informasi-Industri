<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
            padding: 0 15px;
            margin-bottom: 30px; 
        }
        .chart-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
        }
        .row {
            display: flex;
            justify-content: space-between;
            gap: 15px; 
        }
        .col-lg-6 {
            flex: 1;
            min-width: 48%; 
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            <small>Control panel</small>
        </h1>
    </section>
    
    <section class="content">
    <!-- Statistik Data -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $jumlah_perusahaan; ?></h3>
                        <p>Jumlah Data Industri</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $jumlah_kecamatan; ?></h3>
                        <p>Jumlah Kecamatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-map"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $jumlah_kelurahan; ?></h3>
                        <p>Jumlah Kelurahan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-location"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $jumlah_industri_jenis; ?></h3>
                        <p>Jumlah Jenis Industri</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                </div>
            </div>
        </div> 
    

        <div class="row">
            <!-- Grafik Pie -->
            <div class="col-lg-6 col-xs-12">
                <div class="chart-box">
                    <h4>Jumlah Data Industri</h4>
                    <div class="chart-container">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Bar Berdasarkan Risiko -->
            <div class="col-lg-6 col-xs-12">
                <div class="chart-box">
                    <h4>Jumlah Data Industri Berdasarkan Risiko</h4>
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pieLabels = <?php echo json_encode($pie_labels); ?>;
        var pieData = <?php echo json_encode($pie_data); ?>;

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    label: 'Distribusi Kategori',
                    data: pieData,
                    backgroundColor: [
                        '#dd4b39',  
                        '#00c0ef',
                        '#f39c12',
                        '#00a65a',
                        '#9966FF',
                        '#FF9F40'
                    ],
                    borderColor: [
                        '#dd4b39',  
                        '#00c0ef',
                        '#f39c12',
                        '#00a65a',
                        '#9966FF',
                        '#FF9F40'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Grafik Bar Berdasarkan Skala Risiko
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($grafik_labels); ?>,  
                datasets: [{
                    label: 'Jumlah Perusahaan Berdasarkan Risiko',
                    data: <?php echo json_encode($grafik_data); ?>, 
                    backgroundColor: '#00a65a',
                    borderColor: '#00a65a',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Skala Risiko',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Perusahaan',
                            font: {
                                size: 14
                            }
                        },
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

</body>
</html>
