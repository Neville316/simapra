<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use SoftDeletes;
    protected $table = 'mahasiswa';
    protected $fillable = ['user_id', 'nim', 'program_studi', 'angkatan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function pengajuanPkl(): HasMany
    {
    return $this->hasMany(PengajuanPkl::class);
    }
    public function penempatanPkl(): HasMany
    {
        return $this->hasMany(PenempatanPkl::class);
    }
    public function dokumenPkl(): HasMany
    {
        return $this->hasMany(DokumenPkl::class);
    }
}