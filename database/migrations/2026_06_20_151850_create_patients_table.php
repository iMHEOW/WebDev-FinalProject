<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('sex');
            $table->string('email');
            $table->string('phone_number');
            
            // Consultation Schedule Tracking
            $table->date('consultation_date');
            $table->time('consultation_time');
            
            // Examination Notes
            $table->text('symptoms');
            $table->text('diagnosis');
            $table->text('prescription')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};