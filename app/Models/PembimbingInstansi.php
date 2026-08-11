<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\LogsActivity;

class PembimbingInstansi extends Model
{
    use SoftDeletes, LogsActivity;

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