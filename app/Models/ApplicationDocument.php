<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    protected $table = 'applications_documents';
    
    public function document() 
    {
        return $this->belongsTo(Document::class);
    }

public function application() 
    {
        return $this->belongsTo(Application::class);
    }
}
