<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'name',
        'class_id',
        'teacher_id',
        'parent_name',
        'parent_contact',
        'total_points',
    ];

    protected $casts = [
        'total_points' => 'integer',
    ];

    // Relasi N-1: Student berada di satu class
    public function classRoom(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }

    // Relasi N-1: Student memiliki satu wali kelas (teacher)
    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'wali_kelas_id');
    }

    // Relasi 1-N: Student memiliki banyak violation reports
    public function violationReports(): HasMany
    {
        return $this->hasMany(ViolationReport::class, 'student_id');
    }

    // Relasi 1-N: Student memiliki banyak counseling sessions
    public function counselingSessions(): HasMany
    {
        return $this->hasMany(CounselingSession::class, 'student_id');
    }
}
