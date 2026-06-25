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
            $table->text('license_number')->nullable();
            $table->text('availability')->nullable();
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Eloquent ID
            $table->integer('patient_id')->nullable();
            $table->text('name')->nullable();
            $table->text('gender')->nullable();
            $table->text('dob')->nullable();
            $table->text('phone_no')->nullable();
            $table->text('address')->nullable();
            $table->text('email')->nullable();

            // Profile Settings Fields
            $table->text('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medical_conditions')->nullable();

            // Doctor Consultation Fields
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('prescription')->nullable();
            $table->date('consultation_date')->nullable();
            $table->time('consultation_time')->nullable();
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
            $table->integer('prescription_id')->primary();
            $table->integer('patient_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->text('medication')->nullable();
            $table->text('dosage')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('instruction')->nullable();
            $table->integer('refills_left')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('room_id')->primary();
            $table->text('room_number')->nullable();
            $table->text('room_type')->nullable();
            $table->text('status')->nullable();
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
