<?php

namespace App\Enums;

enum JenisDokumen: string
{
    case SURAT_PENGANTAR = 'surat_pengantar';
    case SURAT_PENERIMAAN = 'surat_penerimaan';
    case ABSENSI = 'absensi';
    case LAPORAN_AKHIR = 'laporan_akhir';
    case SERTIFIKAT = 'sertifikat';

    public function label(): string
    {
        return match($this) {
            self::SURAT_PENGANTAR => 'Surat Pengantar',
            self::SURAT_PENERIMAAN => 'Surat Penerimaan',
            self::ABSENSI => 'Absensi',
            self::LAPORAN_AKHIR => 'Laporan Akhir',
            self::SERTIFIKAT => 'Sertifikat Magang',
        };
    }
}