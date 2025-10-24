<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'name',
        'teacher_id',
    ];

    // Relasi N-1: Class dimiliki oleh satu teacher (wali kelas)
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // Relasi 1-N: Class memiliki banyak students
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
