<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('doctors', function (Blueprint $table) {
            $table->integer('doctor_id')->primary();
            $table->text('name')->nullable();
            $table->text('specialization')->nullable();
            $table->text('department')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->integer('patient_id')->primary();
            $table->text('name')->nullable();
            $table->text('gender')->nullable();
            $table->text('dob')->nullable();
            $table->text('phone_no')->nullable();
            $table->text('address')->nullable();
            $table->text('email')->nullable();
            $table->timestamps();
        });

        Schema::create('visit_types', function (Blueprint $table) {
            $table->id('visit_type');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->integer('appointment_id')->primary();
            $table->text('schedule')->nullable();
            $table->integer('patient_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->text('visit_type')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('addnotes')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });

        Schema::create('med_records', function (Blueprint $table) {
            $table->integer('record_id')->primary();
            $table->integer('patient_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->text('date')->nullable();
            $table->text('type')->nullable();
            $table->text('summary')->nullable();
            $table->timestamps();
        });

        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('prescription_id');
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
            $table->id('room_id');
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
