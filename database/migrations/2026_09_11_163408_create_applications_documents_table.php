<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications_documents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('application_id')->constrained()->cascadeOnDelete(); 
        $table->foreignId('document_id')->constrained()->cascadeOnDelete();
        $table->string('appdoc_status');
        $table->string('appdoc_remark')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications_documents');
    }
};
