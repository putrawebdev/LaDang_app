<?php

namespace App\Livewire;

use Livewire\Component;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportUsers extends Component
{
    // Fungsi yang dipanggil saat tombol diklik
    public function export()
    {
        // Download file Excel
        $fileName = 'users_' . date('Y-m-d') . '.xlsx';
        return Excel::download(new UsersExport(), $fileName);
    }

    public function render()
    {
        return view('livewire.export-users');
    }
}
