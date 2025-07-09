<?php

namespace App\Livewire;

use Livewire\Component;
use App\Exports\KategoriExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportKategori extends Component
{
    // Fungsi yang dipanggil saat tombol diklik
    public function export()
    {
        // Download file Excel
        $fileName = 'kategori_' . date('Y-m-d') . '.xlsx';
        return Excel::download(new KategoriExport(), $fileName);
    }
    public function render()
    {
        return view('livewire.export-kategori');
    }
}
