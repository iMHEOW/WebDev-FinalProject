<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('prescriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('prescription_id')->primary();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('medication');
            $table->string('dosage');
            $table->integer('quantity');
            $table->text('instruction');
            $table->integer('refills_left');
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id')->primary();
            $table->string('room_number');
            $table->string('room_type');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('prescriptions');
        Schema::dropIfExists('med_records');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('visit_types');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('admins');
    }
};
