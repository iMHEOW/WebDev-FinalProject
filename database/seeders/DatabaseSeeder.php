<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();
        DB::table('admins')->truncate();
        DB::table('doctors')->truncate();
        DB::table('patients')->truncate();
        DB::table('visit_types')->truncate();
        DB::table('appointments')->truncate();
        DB::table('med_records')->truncate();
        DB::table('prescriptions')->truncate();
        DB::table('rooms')->truncate();
        DB::table('feedbacks')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->importCsv('admin.csv', 'admins');

        $this->importCsv('doctor.csv', 'doctors');
        $this->importCsv('patient.csv', 'patients');
        $this->importCsv('visit_type.csv', 'visit_types');
        $this->importCsv('appointment.csv', 'appointments');
        $this->importCsv('med_record.csv', 'med_records');
        $this->importCsv('prescriptions.csv', 'prescriptions');
        $this->importCsv('room.csv', 'rooms');

        $this->importCsv('feedback.csv', 'feedbacks');
    }

    private function importCsv(string $filename, string $tableName): void
    {
        $csvPath = database_path($filename);

        if (!file_exists($csvPath)) {
            return;
        }

        $csvFile = fopen($csvPath, 'r');
        $headers = fgetcsv($csvFile);

        DB::beginTransaction();

        while (($row = fgetcsv($csvFile)) !== false) {
            $data = array_combine($headers, $row);

            if ($tableName === 'admins') {
                if (isset($data['password'])) {
                    static $cachedAdminHash = null;
                    if (!$cachedAdminHash) {
                        $cachedAdminHash = bcrypt($data['password']);
                    }
                    $data['password'] = $cachedAdminHash;
                }
                unset($data['role']);
            }

            $patientPassword = null;
            if ($tableName === 'doctors' || $tableName === 'patients') {
                static $cachedHash = null;
                if (!$cachedHash) {
                    $cachedHash = bcrypt('password123');
                }
                $data['password'] = $cachedHash;
                if ($tableName === 'patients') {
                    $patientPassword = $data['password'];
                    unset($data['password']);

                    $parts = explode(' ', $data['name']);
                    $lastName = array_pop($parts);
                    $firstName = implode(' ', $parts);
                    $data['first_name'] = $firstName ?: $data['name'];
                    $data['last_name'] = $lastName;
                    
                    $data['sex'] = $data['gender'] ?? null;
                    $data['phone_number'] = $data['phone_no'] ?? null;
                    if (isset($data['dob']) && !empty($data['dob'])) {
                        $data['date_of_birth'] = $data['dob'];
                        try {
                            $data['age'] = \Carbon\Carbon::parse($data['dob'])->age;
                        } catch (\Exception $e) {
                            $data['age'] = null;
                        }
                    }
                }
            }

            $data['created_at'] = now();
            $data['updated_at'] = now();

            DB::table($tableName)->insert($data);

            if ($tableName === 'admins') {
                static $adminIdCounter = 100;
                DB::table('users')->insert([
                    'id' => $adminIdCounter++,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'role' => 'admin',
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($tableName === 'doctors') {
                static $doctorIdCounter = 200;
                DB::table('users')->insert([
                    'id' => $doctorIdCounter++,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'role' => 'doctor',
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($tableName === 'patients') {
                DB::table('users')->insert([
                    'id' => $data['patient_id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $patientPassword,
                    'role' => 'patient',
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        DB::commit();
        fclose($csvFile);
    }
}
