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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->date('interview_date');                    
            $table->time('interview_start_time');                          
            $table->enum('interview_mode', ['onsite', 'online']);    
            $table->string('interview_location', 255)->nullable();   
            $table->text('email_details')->nullable();               
            $table->enum('interview_result', ['pending', 'passed', 'failed', 'cancelled'])->default('pending');

            $table->timestamps();
            $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
