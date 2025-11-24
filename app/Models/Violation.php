<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'point',
        'description',
    ];

    protected $casts = [
        'point' => 'integer',
    ];

    public function violationReports(): HasMany
    {
        return $this->hasMany(ViolationReport::class, 'violation_id');
    }
}
