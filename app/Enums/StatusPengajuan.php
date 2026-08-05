<?php

namespace App\Enums;

enum StatusPengajuan: string
{
    case DRAFT = 'draft';
    case MENUNGGU = 'menunggu';
    case DISETUJUI = 'disetujui';
    case DITOLAK = 'ditolak';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'Draft',
            self::MENUNGGU => 'Menunggu Verifikasi',
            self::DISETUJUI => 'Disetujui',
            self::DITOLAK => 'Ditolak',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::DRAFT => 'bg-gray-100 text-gray-800',
            self::MENUNGGU => 'bg-yellow-100 text-yellow-800',
            self::DISETUJUI => 'bg-green-100 text-green-800',
            self::DITOLAK => 'bg-red-100 text-red-800',
        };
    }
}