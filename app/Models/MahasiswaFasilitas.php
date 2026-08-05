<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MahasiswaFasilitas extends Model
{
    protected $table = 'mahasiswa_fasilitas';

    protected $fillable = ['penempatan_id', 'fasilitas_id', 'status', 'catatan'];

    public function penempatan(): BelongsTo
    {
        return $this->belongsTo(PenempatanPkl::class);
    }

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class);
    }
}