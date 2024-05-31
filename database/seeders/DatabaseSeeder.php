<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IndoRegionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            KabkotSeeder::class,
            MenuAndSubMenuSeeder::class,
            KategoriSeeder::class,
            AspekSeeder::class,
            LayananSeeder::class,
            MediaInformasiSeeder::class,
            OpdSeeder::class,
            KategoriF0Seeder::class,
            MasterF02Seeder::class,
            MasterF03Seeder::class,
        ]);
    }
}
