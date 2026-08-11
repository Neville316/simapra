<?php

namespace App\Models;

use App\Enums\StatusLogbook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivity;

class Logbook extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'logbook';

    protected $fillable = [
        'penempatan_id', 'mahasiswa_id', 'tanggal', 'aktivitas', 
        'dokumentasi_path', 'status', 'catatan_revisi'
    ];

    protected $casts = [
        'status' => StatusLogbook::class,
        'tanggal' => 'date',
    ];

    public function penempatan(): BelongsTo
    {
        return $this->belongsTo(PenempatanPkl::class);
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}