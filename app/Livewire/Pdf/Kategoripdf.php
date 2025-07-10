<?php

namespace App\Livewire\Pdf;

use Livewire\Component;
use App\Models\Kategori;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as DomPDF;
use Illuminate\Support\Facades\Response;

class Kategoripdf extends Component
{
    public $data;
    
    public function mount()
    {
        // Ambil data yang akan diekspor
        $this->data = Kategori::all(); // Sesuaikan query sesuai kebutuhan
    }
    
    public function exportToPdf()
    {
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Data Kategori',
            'date' => date('d/m/Y'),
            'data' => $this->data
        ];
        
        // Generate PDF
        $pdf = app('dompdf.wrapper')->loadView('export.kategoripdf', $data)
                            ->setPaper('a4', 'portrait');
        
        // Download PDF
        return Response::streamDownload(
            fn () => print($pdf->output()),
            "kategori-export-".date('Y-m-d').".pdf"
        );
    }
    
    public function render()
    {
        return view('livewire.pdf.kategoripdf');
    }
}
