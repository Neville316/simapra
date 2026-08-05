<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penilaian extends Model
{
    use SoftDeletes;

    protected $table = 'penilaian';

    protected $fillable = [
        'penempatan_id', 'mahasiswa_id', 'pembimbing_instansi_id',
        'nilai_kedisiplinan', 'nilai_kemampuan_kerja', 'nilai_komunikasi', 'nilai_hasil_kerja',
        'nilai_akhir', 'grade', 'evaluasi', 'rekomendasi'
    ];

    public function penempatan(): BelongsTo
    {
        return $this->belongsTo(PenempatanPkl::class, 'penempatan_id');
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pembimbingInstansi(): BelongsTo
    {
        return $this->belongsTo(PembimbingInstansi::class);
    }
}