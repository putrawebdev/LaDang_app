<?php

namespace App\Livewire;

use App\Exports\BarangExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportBarang extends Component
{
    // Fungsi yang dipanggil saat tombol diklik
    public function export()
    {
        // Download file Excel
        $fileName = 'barangs_' . date('Y-m-d') . '.xlsx';
        return Excel::download(new BarangExport(), $fileName);
    }
    public function render()
    {
        return view('livewire.export-barang');
    }
}
