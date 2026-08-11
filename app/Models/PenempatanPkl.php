<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\LogsActivity;

class PenempatanPkl extends Model
{
    use SoftDeletes, LogsActivity;

    protected $table = 'penempatan_pkl';

    protected $fillable = [
        'pengajuan_id', 'mahasiswa_id', 'instansi_id', 'pembimbing_instansi_id', 
        'periode_pkl_id', 'tanggal_mulai', 'tanggal_selesai', 'status'
    ];

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(PengajuanPkl::class);
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }

    public function pembimbingInstansi(): BelongsTo
    {
        return $this->belongsTo(PembimbingInstansi::class);
    }

    public function periodePkl(): BelongsTo
    {
        return $this->belongsTo(PeriodePkl::class);
    }

    public function fasilitas(): HasMany
    {
        return $this->hasMany(MahasiswaFasilitas::class);
    }
    public function logbooks(): HasMany
    {
        return $this->hasMany(Logbook::class);
    }
    public function penilaian(): HasOne
    {
        return $this->hasOne(Penilaian::class, 'penempatan_id'); 
    }
}