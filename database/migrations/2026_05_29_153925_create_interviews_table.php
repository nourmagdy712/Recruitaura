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
        
            $table->foreignId('application_id')
                  ->constrained()
                  ->onDelete('cascade');
        
            $table->foreignId('recruiter_id')
                  ->constrained()
                  ->onDelete('cascade');
        
            $table->dateTime('scheduled_at');
        
            $table->string('meeting_type')->nullable(); // Online, On-site, Phone
        
            $table->string('meeting_link')->nullable();
        
            $table->string('location')->nullable();
        
            $table->string('status')->default('Pending');

            $table->text('interviewers')->nullable();
        
            $table->string('candidate_response')->nullable();
        
            $table->text('candidate_message')->nullable();
        
            $table->text('recruiter_feedback')->nullable();
        
            $table->timestamps();
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
