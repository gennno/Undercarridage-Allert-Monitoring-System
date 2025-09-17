<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== USERS =====
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanic One',
                'email' => 'mechanic1@example.com',
                'role' => 'mechanic',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supervisor One',
                'email' => 'supervisor1@example.com',
                'role' => 'supervisor',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('users')->insert($users);

        // ===== UNITS =====
        $units = [
            [
                'code_number' => 'DT001',
                'category' => 'Dump Truck',
                'name' => 'Caterpillar 793',
                'photo' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code_number' => 'EX001',
                'category' => 'Excavator',
                'name' => 'Komatsu PC2000',
                'photo' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('units')->insert($units);

        // ===== COMPONENTS =====
        $components = [
            [
                'unit_id' => 1, // DT001
                'part_number' => 'ENG-001',
                'part_name' => 'Engine',
                'hm_new' => 5000,
                'hm_current' => 1200,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit_id' => 1,
                'part_number' => 'TRN-001',
                'part_name' => 'Transmission',
                'hm_new' => 4000,
                'hm_current' => 800,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit_id' => 2, // EX001
                'part_number' => 'HYL-001',
                'part_name' => 'Hydraulic Pump',
                'hm_new' => 6000,
                'hm_current' => 2000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('components')->insert($components);

        // ===== REPORTS =====
        $reports = [
            [
                'unit_id' => 1,
                'component_id' => 1, // Engine
                'user_id' => 2, // Mechanic One
                'jenis' => 'measurement',
                'part_number' => 'ENG-001',
                'photo' => null,
                'datetime' => Carbon::now()->subDays(3),
                'pic' => 'Mechanic One',
                'hm' => 1150,
                'keterangan' => 'Routine measurement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit_id' => 1,
                'component_id' => 2, // Transmission
                'user_id' => 2,
                'jenis' => 'replacement',
                'part_number' => 'TRN-001',
                'photo' => null,
                'datetime' => Carbon::now()->subDay(),
                'pic' => 'Mechanic One',
                'hm' => 800,
                'keterangan' => 'Replaced transmission due to wear',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unit_id' => 2,
                'component_id' => 3, // Hydraulic Pump
                'user_id' => 3, // Supervisor
                'jenis' => 'measurement',
                'part_number' => 'HYL-001',
                'photo' => null,
                'datetime' => Carbon::now(),
                'pic' => 'Supervisor One',
                'hm' => 2000,
                'keterangan' => 'Checked hydraulic system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('reports')->insert($reports);
    }
}
