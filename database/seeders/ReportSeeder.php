<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $components = DB::table('components')->pluck('id', 'unit_id');
        $users      = DB::table('users')->pluck('id');

        $reports = [];

        for ($i = 1; $i <= 10; $i++) {
            $unitId      = DB::table('units')->inRandomOrder()->value('id');
            $componentId = DB::table('components')->where('unit_id', $unitId)->inRandomOrder()->value('id');
            $userId      = $users->random();

            $hm = rand(100, 2000);
            $measurement = rand(80, 200);
            $percentWorn = rand(0, 100);

            $reports[] = [
                'unit_id'          => $unitId,
                'component_id'     => $componentId,
                'user_id'          => $userId,
                'jenis'            => rand(0, 1) ? 'measurement' : 'replacement',
                'photo'            => null,
                'datetime'         => Carbon::now()->subDays(rand(1, 30)),
                'pic'              => 'PIC-' . $i,
                'hm'               => $hm,
                'measurement_value'=> $measurement,
                'percent_worn'     => $percentWorn,
                'lifetime_estimate'=> rand(500, 5000),
                'keterangan'       => 'Dummy report ' . $i,
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }

        DB::table('reports')->insert($reports);
    }
}
