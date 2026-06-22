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
            $table->unsignedBigInteger('doctor_id')->primary();
            $table->string('name');
            $table->string('specialization');
            $table->string('department');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('patients', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id')->primary();
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('phone_no');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('visit_types', function (Blueprint $table) {
            $table->unsignedBigInteger('visit_type')->primary();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id')->primary();
            $table->dateTime('schedule');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('visit_type');
            $table->text('symptoms');
            $table->text('addnotes')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('med_records', function (Blueprint $table) {
            $table->unsignedBigInteger('record_id')->primary();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->date('date');
            $table->string('type');
            $table->text('summary');
            $table->timestamps();
        });

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
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
        Schema::dropIfExists('med_records');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('visit_types');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('admins');
    }
};
