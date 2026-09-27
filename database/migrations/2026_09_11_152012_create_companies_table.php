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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('company_name', 100);
            $table->string('company_description')->nullable();
            $table->string('company_address');
            $table->string('company_website')->nullable();
            $table->string('company_profile')->nullable();
            $table->string('contact_name');
            $table->string('contact_position');
            $table->char('contact_phone' , 10)->nullable();
            $table->string('contact_email', 100)->nullable();
            $table->string('company_logo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
