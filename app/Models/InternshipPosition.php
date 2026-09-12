<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipPosition extends Model
{
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

public function applications() 
    {
        return $this->hasMany(Application::class);
    }
}
