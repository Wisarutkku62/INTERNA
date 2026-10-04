<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{

    protected $table = 'interviews';

    protected $fillable = [
        'application_id',
        'interview_date',
        'interview_start_time',
        'interview_end_time',
        'interview_mode',
        'interview_location',
        'email_details',
        'interview_result',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}