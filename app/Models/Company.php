<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'company_description',
        'company_address',
        'company_website',
        'contact_name',
        'contact_position',
        'contact_phone',
        'contact_email',
        'company_logo_image',
    ];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

public function internshipPositions() 
    {
        return $this->hasMany(InternshipPosition::class);
    }
}
