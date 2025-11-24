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
    ];

    public function classRoom(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }

    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function violationReports(): HasMany
    {
        return $this->hasMany(ViolationReport::class, 'student_id');
    }

    public function counselingSessions(): HasMany
    {
        return $this->hasMany(CounselingSession::class, 'student_id');
    }
}
