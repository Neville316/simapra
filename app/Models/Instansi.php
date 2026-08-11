<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogsActivity;

class Instansi extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'instansi';
    protected $fillable = [
        'nama_instansi', 'alamat', 'kota', 'provinsi', 'kode_pos', 
        'telepon', 'email', 'website', 'bidang_usaha', 'status_aktif'
    ];

    public function pembimbingInstansi(): HasMany
    {
        return $this->hasMany(PembimbingInstansi::class);
    }
    public function pengajuanPkl(): HasMany
    {
        return $this->hasMany(PengajuanPkl::class);
    }
}