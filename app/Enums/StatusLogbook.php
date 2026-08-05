<?php

namespace App\Enums;

enum StatusLogbook: string
{
    case DRAFT = 'draft';
    case MENUNGGU_VALIDASI = 'menunggu_validasi';
    case REVISI = 'revisi';
    case TERVALIDASI = 'tervalidasi';

    public function label(): string
    {
        return match($this) {
            self::DRAFT => 'Draft',
            self::MENUNGGU_VALIDASI => 'Menunggu Validasi',
            self::REVISI => 'Perlu Revisi',
            self::TERVALIDASI => 'Tervalidasi',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::DRAFT => 'bg-gray-100 text-gray-800',
            self::MENUNGGU_VALIDASI => 'bg-yellow-100 text-yellow-800',
            self::REVISI => 'bg-red-100 text-red-800',
            self::TERVALIDASI => 'bg-green-100 text-green-800',
        };
    }
}