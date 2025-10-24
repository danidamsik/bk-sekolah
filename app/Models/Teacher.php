<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'phone',
        'email',
    ];

    // Relasi 1-N: Teacher sebagai wali kelas untuk banyak students
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'wali_kelas_id');
    }

    // Relasi 1-N: Teacher sebagai wali kelas untuk banyak classes
    public function classes(): HasMany
    {
        return $this->hasMany(ClassRoom::class, 'teacher_id');
    }

    // Relasi 1-N: Teacher melaporkan banyak violation reports
    public function violationReports(): HasMany
    {
        return $this->hasMany(ViolationReport::class, 'reporter_id');
    }

    // Relasi 1-N: Teacher (Guru BK) melakukan banyak counseling sessions
    public function counselingSessions(): HasMany
    {
        return $this->hasMany(CounselingSession::class, 'counselor_id');
    }

    // Relasi 1-1: Teacher memiliki satu user account (nullable)
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'teacher_id');
    }
}
