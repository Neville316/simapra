<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivity;

class Fasilitas extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = ['nama_fasilitas', 'deskripsi'];
}