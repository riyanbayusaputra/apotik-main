@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahkategori }}</h3>
                            <p>Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-prescription-bottle-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jumlahproduk }}</h3>
                            <p>Produk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clinic-medical"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlahmember }}</h3>
                            <p>Member</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $jumlahsupplier }}</h3>
                            <p>Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            @foreach ([['Grafik Pengeluaran Bulanan', 'pengeluaranChart', $pengeluaran, 'Pengeluaran', 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)'], ['Grafik Pembelian Bulanan', 'pembelianChart', $pembelian, 'Pembelian', 'rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 0.2)'], ['Grafik Penjualan Bulanan', 'penjualanChart', $penjualan, 'Penjualan', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 0.2)']] as [$title, $chartId, $data, $label, $borderColor, $backgroundColor])
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-gradient-light">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="{{ $chartId }}" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartConfigs = [
        {
            id: 'pengeluaranChart',
            labels: @json($pengeluaran->pluck('bulan')),
            data: @json($pengeluaran->pluck('total')),
            colors: ['rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.3)']
        },
        {
            id: 'pembelianChart',
            labels: @json($pembelian->pluck('bulan')),
            data: @json($pembelian->pluck('total')),
            colors: ['rgba(255, 159, 64, 1)', 'rgba(255, 159, 64, 0.3)']
        },
        {
            id: 'penjualanChart',
            labels: @json($penjualan->pluck('bulan')),
            data: @json($penjualan->pluck('total')),
            colors: ['rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 0.3)']
        }
    ];

    chartConfigs.forEach(config => {
        const ctx = document.getElementById(config.id).getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, config.colors[0]);
        gradient.addColorStop(1, config.colors[1]);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: config.labels,
                datasets: [{
                    label: `${config.id.replace('Chart', '')} (Rp)`,
                    data: config.data,
                    borderColor: config.colors[0],
                    backgroundColor: gradient,
                    borderWidth: 2,
                    fill: true,
                    pointBackgroundColor: config.colors[0],
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: 'white',
                    pointHoverBorderColor: config.colors[0],
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => `Rp ${ctx.raw.toLocaleString()}`,
                            footer: (tooltipItems) => `Total: Rp ${tooltipItems.reduce((acc, curr) => acc + curr.raw, 0).toLocaleString()}`
                        },
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        footerColor: '#fff',
                        borderWidth: 1,
                        borderColor: '#ccc'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan',
                            color: '#666',
                            font: {
                                size: 14
                            }
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nominal (Rp)',
                            color: '#666',
                            font: {
                                size: 14
                            }
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.3)'
                        }
                    }
                },
                elements: {
                    line: {
                        borderJoinStyle: 'round',
                        borderCapStyle: 'round'
                    }
                }
            }
        });
    });
</script>

@endsection