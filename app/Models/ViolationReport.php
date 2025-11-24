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

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function counselingSession(): HasOne
    {
        return $this->hasOne(CounselingSession::class, 'violation_report_id');
    }
}

