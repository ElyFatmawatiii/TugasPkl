@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Dashboard</h3>
        <div class="row">

            <!-- Total Users -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('user') }}" class="text-decoration-none">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Users</p>
                                        <h4 class="card-title">{{ $totalUsers }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Siswa -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('students') }}" class="text-decoration-none">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Siswa</p>
                                        <h4 class="card-title">{{ $totalSiswa }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Guru -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('teacher') }}" class="text-decoration-none">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Guru</p>
                                        <h4 class="card-title">{{ $totalGuru }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Mapel -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('mapel') }}" class="text-decoration-none">
                    <div class="card card-stats card-secondary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Mata Pelajaran</p>
                                        <h4 class="card-title">{{ $totalMapel }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
   


<!-- Row untuk Chart -->
<div class="row">
    <!-- Chart 1: Distribusi Nilai -->
    <div class="col-md-6">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Distribusi Nilai Siswa</div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="studentGradesChart" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart 2: Pie Chart Distribusi Data -->
    <div class="col-md-6">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Distribusi Data</div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="dataPieChart" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Canvas untuk Pie Chart -->
<canvas id="dataPieChart" width="400" height="400"></canvas>

<!-- Canvas untuk Bar Chart -->
<canvas id="studentGradesChart" width="400" height="400"></canvas>

<!-- Script untuk Pie Chart -->
<script>
    var ctxPie = document.getElementById('dataPieChart').getContext('2d');
    var dataPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: <?= json_encode($pieLabels) ?>,
            datasets: [{
                data: <?= json_encode($pieData) ?>,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // Biru
                    'rgba(75, 192, 192, 0.6)', // Hijau
                    'rgba(255, 206, 86, 0.6)', // Kuning
                    'rgba(255, 99, 132, 0.6)'  // Merah
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>

<!-- Script untuk Bar Chart -->
<script>
    var ctxBar = document.getElementById('studentGradesChart').getContext('2d');
    var studentGradesChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nilaiLabels) ?>, // Label kategori nilai, misal: ['A', 'B', 'C', 'D', 'E']
            datasets: [{
                label: 'Frekuensi Nilai',
                data: <?= json_encode($nilaiFrequencies) ?>, // Data frekuensi masing-masing kategori nilai
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // Biru
                    'rgba(75, 192, 192, 0.6)', // Hijau
                    'rgba(255, 206, 86, 0.6)', // Kuning
                    'rgba(255, 159, 64, 0.6)', // Oranye
                    'rgba(255, 99, 132, 0.6)'  // Merah
                ],
                borderColor: 'rgba(0, 0, 0, 0.8)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Frekuensi'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Kategori Nilai'
                    }
                }
            }
        }
    });
</script>


@endsection