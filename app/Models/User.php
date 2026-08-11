<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, LogsActivity;

    protected $fillable = ['role_id', 'name', 'username', 'email', 'password', 'phone', 'status'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function pembimbingInstansi(): HasOne
    {
        return $this->hasOne(PembimbingInstansi::class);
    }

    // Helper untuk cek role
    public function isAdmin(): bool { return $this->role->name === 'admin'; }
    public function isMahasiswa(): bool { return $this->role->name === 'mahasiswa'; }
    public function isPembimbing(): bool { return $this->role->name === 'pembimbing'; }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function logActivity($action, $description = null, $model = null, $properties = null)
    {
        $this->activityLogs()->create([
            'action' => $action,
            'description' => $description,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model ? $model->id : null,
            'properties' => $properties,
        ]);
    }
}