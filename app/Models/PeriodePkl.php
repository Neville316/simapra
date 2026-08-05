<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodePkl extends Model
{
    use SoftDeletes;
    protected $table = 'periode_pkl';
    protected $fillable = ['nama_periode', 'tanggal_mulai', 'tanggal_selesai', 'status'];
}