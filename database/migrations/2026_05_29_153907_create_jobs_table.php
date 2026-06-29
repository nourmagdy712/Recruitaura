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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('recruiter_id')->constrained()->onDelete('cascade');
        
            $table->string('title');
            $table->string('slug')->unique();
        
            $table->string('department')->nullable();
        
            $table->string('location')->nullable();
        
            $table->string('employment_type')->nullable(); // Full-time, Part-time
            $table->string('work_type')->nullable();        // Remote, On-site, Hybrid
        
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
        
            $table->string('experience_level')->nullable();
        
            $table->longText('description');
            $table->longText('requirements')->nullable();
        
            $table->string('status')->default('active');
        
            $table->date('expires_at')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
