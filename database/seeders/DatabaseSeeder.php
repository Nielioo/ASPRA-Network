<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                PermissionTableSeeder::class,
                AdminUserSeeder::class,
                BasicRoleSeeder::class,
                UserSeeder::class,

                ProductSeeder::class,
                MachineSeeder::class,

                OiSeeder::class,
            ]
        );
    }
}
