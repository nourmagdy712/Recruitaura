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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
        
            $table->string('full_name');
        
            $table->string('email')->unique();
        
            $table->string('password');
        
            $table->string('phone')->nullable();
        
            $table->string('location')->nullable();
        
            $table->string('headline')->nullable();
        
            $table->text('summary')->nullable();
        
            $table->text('skills')->nullable();
        
            $table->string('resume')->nullable();
        
            $table->string('image')->nullable(); 

            $table->integer('expected_salary')->nullable();
        
            $table->integer('experience_years')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
