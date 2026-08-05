<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penempatan PKL</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; }
        h2 { text-align: center; margin-bottom: 5px; }
        .subtitle { text-align: center; margin-bottom: 20px; font-size: 12px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .text-center { text-align: center; }
        .signature { margin-top: 50px; text-align: right; width: 300px; margin-left: auto; }
    </style>
</head>
<body>
    <h2>LAPORAN PENEMPATAN PRAKTIK KERJA LAPANGAN</h2>
    <div class="subtitle">ENBI GROUP</div>
    
    <table>
        <thead>
            <tr>
                <th class="text-center" width="30">No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Instansi</th>
                <th>Pembimbing</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Nilai</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $penempatan)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $penempatan->mahasiswa->user->name ?? '-' }}</td>
                <td>{{ $penempatan->mahasiswa->nim ?? '-' }}</td>
                <td>{{ $penempatan->mahasiswa->program_studi ?? '-' }}</td>
                <td>{{ $penempatan->instansi->nama_instansi ?? '-' }}</td>
                <td>{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</td>
                <td>{{ $penempatan->periodePkl->nama_periode ?? '-' }}</td>
                <td>{{ $penempatan->status }}</td>
                <td>{{ $penempatan->penilaian->nilai_akhir ?? 'Belum Ada' }}</td>
                <td>{{ $penempatan->penilaian->grade ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>Hormat Kami,</p>
        <br><br>
        <p><strong>HRD ENBI Group</strong></p>
    </div>
</body>
</html>