<?php

namespace App\Livewire\Pdf;

use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as DomPDF;
use Illuminate\Support\Facades\Response;

class Userpdf extends Component
{
    public $data;
    
    public function mount()
    {
        // Ambil data yang akan diekspor
        $this->data = User::all(); // Sesuaikan query sesuai kebutuhan
    }
    
    public function exportToPdf()
    {
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Data User',
            'date' => date('d/m/Y'),
            'data' => $this->data
        ];
        
        // Generate PDF
        $pdf = app('dompdf.wrapper')->loadView('export.userpdf', $data)
                            ->setPaper('a4', 'portrait');
        
        // Download PDF
        return Response::streamDownload(
            fn () => print($pdf->output()),
            "user-export-".date('Y-m-d').".pdf"
        );
    }
    
    public function render()
    {
        return view('livewire.pdf.userpdf');
    }
}
