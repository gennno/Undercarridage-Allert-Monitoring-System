<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    public function run(): void
    {
        $units = DB::table('units')->pluck('id');
        $components = [];

        $partNames = ['Roller', 'Idler', 'Bucket', 'Track Shoe'];

        foreach ($units as $unitId) {
            foreach ($partNames as $index => $part) {
                $components[] = [
                    'unit_id'       => $unitId,
                    'part_number'   => 'PN-' . $unitId . '-' . ($index + 1),
                    'part_name'     => $part,
                    'nilai_standar' => rand(150, 200),
                    'nilai_limit'   => rand(100, 149),
                    'hm_new'        => 0,
                    'hm_current'    => rand(100, 2000),
                    'status'        => 'aktif',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];
            }
        }

        DB::table('components')->insert($components);
    }
}
