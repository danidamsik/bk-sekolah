<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'teacher_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi 1-1 (nullable): User bisa terhubung dengan satu teacher
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // Helper method untuk cek role
    public function isAdmin(): bool
    {
        return $this->role === 'Admin';
    }

    public function isGuruBK(): bool
    {
        return $this->role === 'GuruBK';
    }

    public function isWaliKelas(): bool
    {
        return $this->role === 'WaliKelas';
    }
}
