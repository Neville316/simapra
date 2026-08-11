<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\LogsActivity;

class PeriodePkl extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'periode_pkl';
    protected $fillable = ['nama_periode', 'tanggal_mulai', 'tanggal_selesai', 'status'];
}