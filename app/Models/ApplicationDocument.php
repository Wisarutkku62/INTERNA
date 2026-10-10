<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    protected $table = 'applications_documents'; 

    protected $fillable = [
        'application_id',
        'document_id',
        'appdoc_status',
        'appdoc_remark',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}
