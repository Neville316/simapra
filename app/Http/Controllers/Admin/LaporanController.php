<?php
// Path: app/Http/Controllers/Admin/LaporanController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LaporanService;
use App\Models\PeriodePkl;
use App\Models\Instansi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct(protected LaporanService $laporanService) {}

    public function index()
    {
        $periodes = PeriodePkl::orderBy('tanggal_mulai', 'desc')->get();
        
        // UBAH 'nama' MENJADI 'nama_instansi' SESUAI KOLON DI DATABASE ANDA
        $instansiList = Instansi::orderBy('nama_instansi', 'asc')->get(); 

        return view('pages.admin.laporan.index', compact('periodes', 'instansiList'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'format' => 'required|in:excel,pdf',
            'periode_pkl_id' => 'nullable|exists:periode_pkl,id',
            'instansi_id' => 'nullable|exists:instansi,id',
        ]);

        $filters = $request->only(['periode_pkl_id', 'instansi_id', 'status']);

        if ($request->format === 'excel') {
            return $this->laporanService->exportExcel($filters);
        }

        return $this->laporanService->exportPdf($filters);
    }
}