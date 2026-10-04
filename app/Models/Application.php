<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'internship_position_id',
        'student_id',
        'application_status',
        'reject_reason',
        'resume',
        'interview',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function applicationDocuments()
    {
        return $this->hasMany(ApplicationDocument::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function latestEvaluation()
    {
        return $this->hasOne(Evaluation::class)->latestOfMany();
    }

    public function interview()
    {
        return $this->hasOne(Interview::class, 'application_id');
    }

    public function internshipPosition()
    {
        return $this->belongsTo(InternshipPosition::class, 'internship_position_id');
    }
}
