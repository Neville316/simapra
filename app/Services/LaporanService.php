<?php
// Path: app/Services/LaporanService.php
namespace App\Services;

use App\Models\PenempatanPkl;
use App\Exports\PenempatanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanService
{
    public function getPenempatanData(array $filters = [])
    {
        return PenempatanPkl::with([
            'mahasiswa.user',       // Relasi mahasiswa -> user
            'instansi',             // Relasi instansi
            'pembimbingInstansi.user', // Relasi pembimbingInstansi -> user
            'penilaian',            // Relasi penilaian
            'periodePkl'            // Relasi periodePkl
        ])
        ->when(isset($filters['periode_pkl_id']), fn($q) => $q->where('periode_pkl_id', $filters['periode_pkl_id']))
        ->when(isset($filters['instansi_id']), fn($q) => $q->where('instansi_id', $filters['instansi_id']))
        ->when(isset($filters['status']), fn($q) => $q->where('status', $filters['status']))
        ->latest()
        ->get();
    }

    public function exportExcel(array $filters)
    {
        $data = $this->getPenempatanData($filters);
        return Excel::download(new PenempatanExport($data), 'laporan-penempatan-pkl.xlsx');
    }

    public function exportPdf(array $filters)
    {
        $data = $this->getPenempatanData($filters);
        $pdf = Pdf::loadView('pages.admin.laporan.pdf_penempatan', compact('data'));
        $pdf->setPaper('a4', 'landscape'); 
        return $pdf->download('laporan-penempatan-pkl.pdf');
    }
}