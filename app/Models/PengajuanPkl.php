<?php

namespace App\Models;

use App\Enums\StatusPengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne; 
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanPkl extends Model
{
    use SoftDeletes;

    protected $table = 'pengajuan_pkl';

    protected $fillable = [
        'mahasiswa_id', 'instansi_id', 'tanggal_pengajuan', 'status', 'catatan'
    ];

    // Cast kolom status ke Enum secara otomatis
    protected $casts = [
        'status' => StatusPengajuan::class,
        'tanggal_pengajuan' => 'date',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }
    public function penempatan(): HasOne
    {
        return $this->hasOne(PenempatanPkl::class, 'pengajuan_id'); // <-- Tambahkan 'pengajuan_id' sebagai parameter kedua
    }
}