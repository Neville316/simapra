<?php

namespace App\Models;

use App\Enums\JenisDokumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

use App\Traits\LogsActivity;

class DokumenPkl extends Model
{
    use SoftDeletes, LogsActivity;

    protected $table = 'dokumen_pkl';

    protected $fillable = [
        'mahasiswa_id', 'jenis_dokumen', 'file_path', 'nama_file_asli'
    ];

    protected $casts = [
        'jenis_dokumen' => JenisDokumen::class,
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}