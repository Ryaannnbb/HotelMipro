<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            "nama_kategori" => "Standard Room",
        ]);

        Kategori::create([
            "nama_kategori" => "Deluxe Room",
        ]);

        Kategori::create([
            "nama_kategori" => "Suite",
        ]);

        Kategori::create([
            "nama_kategori" => "Family Room",
        ]);

        Kategori::create([
            "nama_kategori" => "Executive Room",
        ]);

        Kategori::create([
            "nama_kategori" => "Superior Room",
        ]);
    }
}
