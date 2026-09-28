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
        Schema::create('internship_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('position_name');
            $table->string('position_description')->nullable();
            $table->string('position_qualification')->nullable();
            $table->string('position_category');
            $table->integer('position_capacity');
            $table->decimal('position_allowance');
            $table->string('position_workdate');
            $table->string('position_worktime');
            $table->string('position_worktype');
            $table->string('position_interview_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_positions');
    }
};
