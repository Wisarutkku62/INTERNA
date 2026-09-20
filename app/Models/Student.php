<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'student_fname',
        'student_lname',
        'student_gender',
        'student_birthday',
        'student_religion',
        'student_nationality',
        'student_degree',
        'student_bio',
        'student_email',
        'student_phone',
        'student_address',
    ];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function documents() 
    {
        return $this->hasMany(Document::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
