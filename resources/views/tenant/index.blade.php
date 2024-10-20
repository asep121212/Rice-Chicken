@extends('tenant.layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">Welcome {{ Auth::user()->name }}</h1>

  <div class="row">
    <!-- Product Chart -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="chart-area">
            <canvas id="productChart"></canvas>
          </div>
          <div class="text-center mt-2">Total Products and Categories</div>
        </div>
      </div>
    </div>

    <!-- Discount Chart -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="chart-area">
            <canvas id="discountChart"></canvas>
          </div>
          <div class="text-center mt-2">Total Discounts</div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Laporan Chart -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="chart-area">
            <canvas id="laporanChart"></canvas>
          </div>
          <div class="text-center mt-2">Laporan Summary</div>
        </div>
      </div>
    </div>
    <!-- Laporan Chart -->
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="chart-area">
            <canvas id="PemasukanChart"></canvas>
          </div>
          <div class="text-center mt-2">Pemasukan Summary</div>
        </div>
      </div>
    </div>
    <!-- Tasks Completion Chart -->
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="chart-area">
            <canvas id="tasksChart"></canvas>
          </div>
          <div class="text-center mt-2">Tasks Completion</div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Product and Category Chart
    var ctxProduct = document.getElementById('productChart').getContext('2d');
    var productChart = new Chart(ctxProduct, {
      type: 'doughnut',
      data: {
        labels: ['Products', 'Categories'],
        datasets: [{
          data: [{{ $totalProducts }}, {{ $totalCategory }}],
          backgroundColor: ['#4e73df', '#1cc88a'],
          hoverBackgroundColor: ['#2e59d9', '#17a673'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
        },
        legend: {
          display: true
        }
      }
    });

    // Discount Chart
    var ctxDiscount = document.getElementById('discountChart').getContext('2d');
    var discountChart = new Chart(ctxDiscount, {
      type: 'bar',
      data: {
        labels: ['Total Discount'],
        datasets: [{
          label: 'Discount in IDR',
          data: [{{ $totalDiscount }}],
          backgroundColor: '#f6c23e',
          hoverBackgroundColor: '#f4b619',
          borderColor: '#f6c23e',
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });

    // Laporan Chart
    var ctxLaporan = document.getElementById('laporanChart').getContext('2d');
    var laporanChart = new Chart(ctxLaporan, {
      type: 'bar',
      data: {
        labels: ['Tunai', 'Pengeluaran'],
        datasets: [{
          label: 'Laporan Summary in IDR',
          data: [{{ $laporanData->totalTunai }}, {{ $laporanData->totalPengeluaran }}],
          backgroundColor: ['#36b9cc', '#1cc88a', '#f6c23e'],
          hoverBackgroundColor: ['#2c9faf', '#17a673', '#f4b619'],
          borderColor: ['#36b9cc', '#1cc88a', '#f6c23e'],
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: true
        }
      }
    });
 // Pemasukan Chart
    var ctxPemasukan = document.getElementById('PemasukanChart').getContext('2d');
    var PemasukanChart = new Chart(ctxPemasukan, {
      type: 'bar',
      data: {
        labels: ['Tunai', 'Qr'],
        datasets: [{
          label: 'Pemasukan Summary in IDR',
          data: [{{ $pemasukanData->totalTunais }}, {{ $pemasukanData->totalQr }}],
          backgroundColor: ['#36b9cc', '#1cc88a', '#f6c23e'],
          hoverBackgroundColor: ['#2c9faf', '#17a673', '#f4b619'],
          borderColor: ['#36b9cc', '#1cc88a', '#f6c23e'],
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: true
        }
      }
    });

    // Tasks Completion Chart
    var ctxTasks = document.getElementById('tasksChart').getContext('2d');
    var tasksChart = new Chart(ctxTasks, {
      type: 'radialGauge',
      data: {
        labels: ['Tasks Completion'],
        datasets: [{
          data: [{{ $tasksCompletion }}],
          backgroundColor: '#36b9cc',
          hoverBackgroundColor: '#2c9faf',
          borderColor: '#36b9cc',
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              max: 100
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  </script>
@endpush
