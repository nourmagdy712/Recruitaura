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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('job_id')
                  ->constrained()
                  ->onDelete('cascade');
        
            $table->foreignId('candidate_id')
                  ->constrained()
                  ->onDelete('cascade');
        
            $table->string('status')
                  ->default('Applied');
        
            $table->unsignedTinyInteger('technical_aura')->nullable();
            $table->unsignedTinyInteger('experience_aura')->nullable();
            $table->unsignedTinyInteger('communication_aura')->nullable();
            $table->unsignedTinyInteger('culture_fit_aura')->nullable();
              
                  // final score (can be manual or calculated)
            $table->unsignedTinyInteger('aura_score')->nullable();
        
            $table->text('recruiter_note')
                  ->nullable();
        
            $table->timestamp('applied_at')
                  ->nullable();
        
            $table->timestamps();
        
            $table->unique(['job_id', 'candidate_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
