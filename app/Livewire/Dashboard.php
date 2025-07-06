<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $title = 'Dashboard';
    public function render()
    {
        return view('livewire.dashboard');
    }
    public $totalBarang;
    public $totalKategori;
    public $stokRendah;
    public $totalNilai;
    public $barangTrend;
    public $kategoriTrend;
    public $nilaiTrend;
    public $barangChart;
    public $kategoriChart;
    public $recentActivities;

    public function mount()
    {
        $this->loadStats();
        $this->loadCharts();
        $this->loadRecentActivities();
    }

    protected function loadStats()
    {
        $this->totalBarang = Barang::count();
        $lastMonthBarang = Barang::where('created_at', '>=', now()->subMonth())->count();
        $this->barangTrend = $this->calculateTrend($this->totalBarang, $lastMonthBarang);

        $this->totalKategori = Kategori::count();
        $lastMonthKategori = Kategori::where('created_at', '>=', now()->subMonth())->count();
        $this->kategoriTrend = $this->calculateTrend($this->totalKategori, $lastMonthKategori);

        $this->stokRendah = Barang::where('stok_barang', '<', 10)->count();

        $this->totalNilai = Barang::sum(DB::raw('harga * stok_barang'));
        $lastMonthNilai = Barang::where('created_at', '>=', now()->subMonth())
            ->sum(DB::raw('harga * stok_barang'));
        $this->nilaiTrend = $this->calculateTrend($this->totalNilai, $lastMonthNilai);
    }

    protected function loadCharts()
    {
        // Barang Chart (Last 30 days)
        $barangData = Barang::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $data = [];
        
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('d M');
            $count = $barangData->where('date', $date)->first();
            $data[] = $count ? $count->count : 0;
        }

        $this->barangChart = [
            'labels' => $labels,
            'data' => $data
        ];

        // Kategori Chart
        $kategoriData = Kategori::withCount('barangs')->get();

        $this->kategoriChart = [
            'labels' => $kategoriData->pluck('name_kategori'),
            'data' => $kategoriData->pluck('barangs_count')
        ];
    }

    protected function loadRecentActivities()
    {
        $this->recentActivities = [
            [
                'icon' => 'fas fa-box',
                'title' => 'Barang Baru Ditambahkan',
                'description' => 'Laptop Dell XPS 15 ditambahkan ke inventaris',
                'time' => '10 menit yang lalu'
            ],
            [
                'icon' => 'fas fa-user',
                'title' => 'Pengguna Baru',
                'description' => 'Budi Santoso bergabung sebagai staff gudang',
                'time' => '1 jam yang lalu'
            ],
            [
                'icon' => 'fas fa-tags',
                'title' => 'Kategori Diperbarui',
                'description' => 'Kategori "Elektronik" diperbarui',
                'time' => '3 jam yang lalu'
            ],
            [
                'icon' => 'fas fa-shopping-cart',
                'title' => 'Barang Keluar',
                'description' => '5 unit Mouse Wireless dikeluarkan dari gudang',
                'time' => 'Kemarin'
            ]
        ];
    }

    protected function calculateTrend($current, $previous)
    {
        if ($previous == 0) return 0;
        return round((($current - $previous) / $previous) * 100, 2);
    }
}
