<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembimbingInstansi extends Model
{
    use SoftDeletes;

    protected $table = 'pembimbing_instansi'; 
    protected $fillable = ['user_id', 'instansi_id', 'nip', 'jabatan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class);
    }
}