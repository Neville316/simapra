<?php

namespace App\Enums;

enum StatusAktif: int
{
    case TIDAK_AKTIF = 0;
    case AKTIF = 1;

    public function label(): string
    {
        return match($this) {
            self::TIDAK_AKTIF => 'Tidak Aktif',
            self::AKTIF => 'Aktif',
        };
    }
}