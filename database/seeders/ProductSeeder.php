<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = ['PVC', 'PET', 'HDPE', 'LDPE', 'PP', 'PS', 'PC'];
        $colors = ['NATURAL', 'PUTIH', 'HITAM'];
        $packingTypes = ['SAK', 'DUS'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'product_code' => 'PROD' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'name' => 'PRODUK ' . ($i + 1),
                'material' => $materials[array_rand($materials)],
                'weight' => rand(1, 50) . ' GR',
                'volume' => rand(1, 50) . ' ML',
                'color' => $colors[array_rand($colors)],
                'packing' => $packingTypes[array_rand($packingTypes)],
                'product_content' => rand(1, 100),
                'remaining_stock' => 0,
                'outstanding' => 0,
                'needs_per_month' => rand(50000, 100000),
                'last_order_date' => Carbon::now()->subDays(rand(1, 30))->format('Y-m-d'),
                'grand_total_rejected' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
