<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PenerbitSeeder::class,
            BukuSeeder::class,
            EbookSeeder::class,
            MejaSeeder::class,
            SkripsiSeeder::class,
        ]);
    }
}