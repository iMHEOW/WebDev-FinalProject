<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Import admins first
        $this->importCsv('admin.csv', 'admins');

        // Import all CSVs in order (doctors and patients must be seeded first due to foreign relationships!)
        $this->importCsv('doctor.csv', 'doctors');
        $this->importCsv('patient.csv', 'patients');
        $this->importCsv('visit_type.csv', 'visit_types');
        $this->importCsv('appointment.csv', 'appointments');
        $this->importCsv('med_record.csv', 'med_records');
        $this->importCsv('prescriptions.csv', 'prescriptions');
    }

    /**
     * Reusable CSV Import Helper Function
     */
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

            // Hash passwords for the admins table and strip 'role'
            if ($tableName === 'admins') {
                if (isset($data['password'])) {
                    $data['password'] = bcrypt($data['password']);
                }
                unset($data['role']);
            }

            // Set and hash passwords for doctors and patients (defaults to 'password123' if not in CSV)
            if ($tableName === 'doctors' || $tableName === 'patients') {
                $rawPassword = $data['password'] ?? 'password123';
                $data['password'] = bcrypt($rawPassword);
            }

            // Add standard Laravel timestamps
            $data['created_at'] = now();
            $data['updated_at'] = now();

            DB::table($tableName)->insert($data);
        }

        fclose($csvFile);
    }
}
