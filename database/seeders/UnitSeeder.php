<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Dozer', 'Drilling', 'PC'];
        $units = [];

        foreach ($categories as $cat) {
            for ($i = 1; $i <= 5; $i++) {
                $units[] = [
                    'code_number' => strtoupper(substr($cat, 0, 2)) . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'category'    => $cat,
                    'name'        => $cat . ' Unit ' . $i,
                    'photo'       => null,
                    'status'      => 'active',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            }
        }

        DB::table('units')->insert($units);
    }
}
