<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id'); // Links to the user row
            $table->string('age');
            $table->string('condition_summary'); // e.g., "Hypertension"
            $table->text('consultation_notes'); // Long doctor text
            $table->text('prescription')->nullable(); // Meds given
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};