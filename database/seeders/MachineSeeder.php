<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machineTypes = ['I', 'P'];

        for ($i = 0; $i < 5; $i++) {
            DB::table('machines')->insert([
                'number' => $machineTypes[array_rand($machineTypes)].' - ' . rand(2,10),
                'name' => 'MACHINE ' . ($i + 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
