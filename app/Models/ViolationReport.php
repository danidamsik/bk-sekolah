<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ViolationReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'violation_id',
        'teacher_id',
        'date',
        'time',
        'location',
        'description',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
    ];

    // Relasi N-1: Violation report dimiliki oleh satu student
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relasi N-1: Violation report mengacu pada satu violation
    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }

    // Relasi N-1: Violation report dilaporkan oleh satu teacher
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'reporter_id');
    }

    // Relasi 1-1: Violation report memiliki satu counseling session
    public function counselingSession(): HasOne
    {
        return $this->hasOne(CounselingSession::class, 'report_id');
    }
}

