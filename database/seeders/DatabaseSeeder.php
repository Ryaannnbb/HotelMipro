<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fasilitas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\KamarSeeder;
use Database\Seeders\DiskonSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            KamarSeeder::class,
            // DiskonSeeder::class,
            PembayaranSeeder::class,
            FasilitasSeeder::class,
        ]);
    }
}
