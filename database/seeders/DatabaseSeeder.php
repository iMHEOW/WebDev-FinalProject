<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->truncate();

        $this->importCsv('admin.csv', 'admins');

        $this->importCsv('doctor.csv', 'doctors');
        $this->importCsv('patient.csv', 'patients');
        $this->importCsv('visit_type.csv', 'visit_types');
        $this->importCsv('appointment.csv', 'appointments');
        $this->importCsv('med_record.csv', 'med_records');
        $this->importCsv('prescriptions.csv', 'prescriptions');
        $this->importCsv('room.csv', 'rooms');
    }

    private function importCsv(string $filename, string $tableName): void
    {
        $csvPath = database_path($filename);

        if (!file_exists($csvPath)) {
            return;
        }

        $csvFile = fopen($csvPath, 'r');
        $headers = fgetcsv($csvFile);

        while (($row = fgetcsv($csvFile)) !== false) {
            $data = array_combine($headers, $row);

            if ($tableName === 'admins') {
                if (isset($data['password'])) {
                    $data['password'] = bcrypt($data['password']);
                }
                unset($data['role']);
            }

            if ($tableName === 'doctors' || $tableName === 'patients') {
                $rawPassword = $data['password'] ?? 'password123';
                $data['password'] = bcrypt($rawPassword);
            }

            $data['created_at'] = now();
            $data['updated_at'] = now();

            DB::table($tableName)->insert($data);

            if ($tableName === 'admins') {
                DB::table('users')->insert([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'role' => 'admin',
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($tableName === 'doctors') {
                DB::table('users')->insert([
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
                    'password' => $data['password'],
                    'role' => 'patient',
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        fclose($csvFile);
    }
}
