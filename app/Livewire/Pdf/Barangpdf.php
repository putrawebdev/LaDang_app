<?php

namespace App\Livewire\Pdf;

use App\Models\Barang;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as DomPDF;
use Illuminate\Support\Facades\Response;

class Barangpdf extends Component
{
    public $data;
    
    public function mount()
    {
        // Ambil data yang akan diekspor
        $this->data = Barang::join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
                ->orderBy('kategoris.id')
                ->select('barangs.*')
                ->get();; // Sesuaikan query sesuai kebutuhan
    }
    
    public function exportToPdf()
    {
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Data Barang',
            'date' => date('d/m/Y'),
            'data' => $this->data
        ];
        
        // Generate PDF
        $pdf = app('dompdf.wrapper')->loadView('export.barangpdf', $data)
                            ->setPaper('a4', 'portrait');
        
        // Download PDF
        return Response::streamDownload(
            fn () => print($pdf->output()),
            "barang-export-".date('Y-m-d').".pdf"
        );
    }
    
    public function render()
    {
        return view('livewire.pdf.barangpdf');
    }
}
