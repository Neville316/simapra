<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penempatan PKL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 10px;
            padding: 30px;
            color: #1e293b;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #4f46e5;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 1px;
        }
        .header .subtitle {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
        }
        .header .company {
            font-size: 11px;
            color: #4f46e5;
            font-weight: 600;
            margin-top: 2px;
        }
        .meta-info {
            display: flex;
            justify-content: space-between;
            font-size: 9px;
            color: #64748b;
            margin-bottom: 12px;
            padding: 8px 12px;
            background: #f8fafc;
            border-radius: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 9px;
        }
        th, td {
            border: 1px solid #cbd5e1;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #f1f5f9;
            font-weight: 700;
            color: #0f172a;
            text-transform: uppercase;
            font-size: 8px;
            letter-spacing: 0.5px;
        }
        td {
            color: #1e293b;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .badge-success {
            color: #16a34a;
            font-weight: 600;
        }
        .badge-warning {
            color: #d97706;
            font-weight: 600;
        }
        .badge-danger {
            color: #dc2626;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #fafbfc;
        }
        tr:hover {
            background-color: #f1f5f9;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            font-size: 9px;
            color: #94a3b8;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
            width: 280px;
            margin-left: auto;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        .signature p {
            font-size: 10px;
            color: #1e293b;
        }
        .signature .name {
            font-weight: 700;
            font-size: 11px;
            margin-top: 30px;
        }
        .total-row {
            font-weight: 700;
            background-color: #f1f5f9 !important;
        }
        .total-row td {
            border-top: 2px solid #4f46e5;
        }
        @page {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PENEMPATAN PRAKTIK KERJA LAPANGAN</h2>
        <div class="subtitle">Sistem Informasi Manajemen PKL (SIMAPRA)</div>
        <div class="company">HRD ENBI GROUP</div>
    </div>

    <div class="meta-info">
        <span>📅 Dicetak: {{ now()->format('d M Y H:i') }}</span>
        <span>📋 Total Data: {{ $data->count() }} Penempatan</span>
        <span>🏢 ENBI Group</span>
    </div>
    
    <table>
        <thead>
            <tr>
                <th class="text-center" width="25">No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Instansi</th>
                <th>Pembimbing</th>
                <th>Periode</th>
                <th class="text-center">Status</th>
                <th class="text-center">Nilai</th>
                <th class="text-center">Grade</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $key => $penempatan)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $penempatan->mahasiswa->user->name ?? '-' }}</td>
                <td>{{ $penempatan->mahasiswa->nim ?? '-' }}</td>
                <td>{{ $penempatan->mahasiswa->program_studi ?? '-' }}</td>
                <td>{{ $penempatan->instansi->nama_instansi ?? '-' }}</td>
                <td>{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</td>
                <td>{{ $penempatan->periodePkl->nama_periode ?? '-' }}</td>
                <td class="text-center">
                    @if($penempatan->status == 'aktif')
                        <span class="badge-success">● Aktif</span>
                    @elseif($penempatan->status == 'selesai')
                        <span class="badge-success">● Selesai</span>
                    @else
                        <span class="badge-warning">● {{ ucfirst($penempatan->status) }}</span>
                    @endif
                </td>
                <td class="text-center">{{ $penempatan->penilaian->nilai_akhir ?? 'Belum Ada' }}</td>
                <td class="text-center">{{ $penempatan->penilaian->grade ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center" style="padding: 30px; color: #94a3b8;">
                    Tidak ada data penempatan PKL.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <span>SIMAPRA v1.0</span>
        <span>Laporan generated automatically</span>
    </div>

    <div class="signature">
        <p>Hormat Kami,</p>
        <br><br><br>
        <p class="name">HRD ENBI Group</p>
        <p style="font-size: 9px; color: #94a3b8; margin-top: 4px;">Mengetahui,</p>
    </div>
</body>
</html>