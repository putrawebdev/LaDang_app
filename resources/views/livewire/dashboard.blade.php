<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalBarang }}</h3>
                                <p>Total Barang</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <a href="{{ route('superadmin.barang') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalKategori }}</h3>
                                <p>Total Kategori</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <a href="{{ route('superadmin.kategori') }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $stokRendah }}</h3>
                                <p>Stok Rendah</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Rp {{ number_format($totalNilai, 0, ',', '.') }}</h3>
                                <p>Total Nilai Inventaris</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                &nbsp;
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            
                <!-- Main row -->
                <div class="row">
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-line mr-1"></i>
                                    Penambahan Barang (30 Hari Terakhir)
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barangChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
            
                    <section class="col-lg-5 connectedSortable">
                        <!-- Pie chart -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Distribusi Kategori
                                </h3>
                            </div>
                            <div class="card-body">
                                <canvas id="kategoriChart" height="250"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                </div>
                <!-- /.row -->
            
                <!-- Recent Activities -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-history mr-1"></i>
                                    Aktivitas Terakhir
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    @foreach($recentActivities as $activity)
                                    <div class="time-label">
                                        <span class="bg-{{ $loop->first ? 'red' : 'info' }}">{{ $activity['time'] }}</span>
                                    </div>
                                    <div>
                                        <i class="{{ $activity['icon'] }} bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> {{ $activity['time'] }}</span>
                                            <h3 class="timeline-header">{{ $activity['title'] }}</h3>
                                            <div class="timeline-body">
                                                {{ $activity['description'] }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div>
                                        <i class="fas fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
                <script>
                document.addEventListener('livewire:init', () => {
                    // Barang Chart
                    const barangCtx = document.getElementById('barangChart').getContext('2d');
                    new Chart(barangCtx, {
                        type: 'line',
                        data: {
                            labels: @json($barangChart['labels']),
                            datasets: [{
                                label: 'Jumlah Barang',
                                data: @json($barangChart['data']),
                                backgroundColor: 'rgba(60, 141, 188, 0.9)',
                                borderColor: 'rgba(60, 141, 188, 0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                fill: true
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    }
                                },
                                y: {
                                    grid: {
                                        display: false
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            
                    // Kategori Chart
                    const kategoriCtx = document.getElementById('kategoriChart').getContext('2d');
                    new Chart(kategoriCtx, {
                        type: 'pie',
                        data: {
                            labels: @json($kategoriChart['labels']),
                            datasets: [{
                                data: @json($kategoriChart['data']),
                                backgroundColor: [
                                    '#f56954',
                                    '#00a65a',
                                    '#f39c12',
                                    '#00c0ef',
                                    '#3c8dbc',
                                    '#d2d6de'
                                ],
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'right'
                                }
                            }
                        }
                    });
                });
                </script>
                @endpush
            </div>
        </section>
    </div>
</div>

