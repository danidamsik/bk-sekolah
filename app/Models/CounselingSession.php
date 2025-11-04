<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CounselingSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'violation_report_id',
        'teacher_id',
        'notes',
        'recommendation',
        'follow_up_plan',
        'session_date',
    ];

    protected $casts = [
        'session_date' => 'date',
    ];

    // Relasi N-1: Counseling session untuk satu student
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relasi 1-1: Counseling session terkait dengan satu violation report
    public function violationReport(): BelongsTo
    {
        return $this->belongsTo(ViolationReport::class, 'violation_report_id');
    }

    // Relasi N-1: Counseling session ditangani oleh satu counselor (teacher/Guru BK)
    public function counselor(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
