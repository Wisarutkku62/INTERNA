<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'evaluation_type',
        'evaluation_score',
        'evaluation_feedback',
    ];

    public function application() 
    {
        return $this->belongsTo(Application::class);
    }
}