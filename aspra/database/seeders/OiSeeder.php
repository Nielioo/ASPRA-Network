<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('ois')->insert([
                'product_id' => ($i + 1),
                'date_created' => Carbon::now(),
                'customer_name' => 'Customer ' . ($i + 1),
                'total_order' => rand(100,1000),
                'placement_location' => 'Warehouse ' . ($i + 1),
                'delivery_stage' => Carbon::tomorrow()->addDay(rand(2,7)),
                'special_request' => 'Tidak Ada',
                'verification_one' => false,
                'verification_two' => false,
                'verification_three' => false,
                'verification_four' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
