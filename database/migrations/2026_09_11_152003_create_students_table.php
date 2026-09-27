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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('student_fname', 100);
            $table->string('student_lname', 100);
            $table->string('student_gender')->nullable();
            $table->date('student_birthday')->nullable();
            $table->string('student_religion')->nullable();
            $table->string('student_nationality')->nullable();
            $table->string('student_degree')->nullable();
            $table->string('student_bio')->nullable();
            $table->string('student_email', 100);
            $table->char('student_phone', 10)->nullable();
            $table->string('student_address', 200)->nullable();
            $table->string('student_profile')->nullable();
            $table->timestamps();
            $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
