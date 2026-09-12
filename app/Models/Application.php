<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function student() 
    {
        return $this->belongsTo(Student::class);
    }

public function internshipPosition() 
    { 
        return $this->belongsTo(InternshipPosition::class);
    }

public function applicationDocuments() 
    {
        return $this->hasMany(ApplicationDocument::class);
    }   

public function evaluations() 
    {
        return $this->hasMany(Evaluation::class);
    }
}
