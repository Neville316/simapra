<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenempatanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Mahasiswa',
            'NIM',
            'Instansi',
            'Pembimbing Instansi',
            'Status',
            'Tanggal Mulai',
            'Tanggal Selesai',
        ];
    }

    public function map($penempatan): array
    {
        static $no = 1;
        
        return [
            $no++,
            $penempatan->mahasiswa?->user?->name ?? '-',
            $penempatan->mahasiswa?->nim ?? '-',
            $penempatan->instansi?->nama ?? '-',
            $penempatan->pembimbingInstansi?->user?->name ?? '-',
            $penempatan->status ?? '-',
            $penempatan->periodePkl?->tanggal_mulai ?? '-',
            $penempatan->periodePkl?->tanggal_selesai ?? '-',
        ];
    }
}
