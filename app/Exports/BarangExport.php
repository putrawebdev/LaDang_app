<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection
{
    
    // Ambil semua data
    public function collection()
    {
        return Barang::join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
                ->orderBy('kategoris.id')
                ->select('barangs.*')
                ->get();
    }

    
}
