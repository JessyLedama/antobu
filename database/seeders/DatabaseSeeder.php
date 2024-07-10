<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SlideshowSeeder::class,
            StatusSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            RolesAndPermissionsSeeder::class,
            TaxSeeder::class
        ]);
    }
}
