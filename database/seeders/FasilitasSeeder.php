<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitas::create([
            "nama_fasilitas" => "Kolam Renang",
            "harga_satuan" => 50000,
        ]);

        Fasilitas::create([
            "nama_fasilitas" => "Layanan Spa",
            "harga_satuan" => 200000,
        ]);

        Fasilitas::create([
            "nama_fasilitas" => "Gym",
            "harga_satuan" => 75000,
        ]);

        Fasilitas::create([
            "nama_fasilitas" => "Layanan Kamar 24 Jam",
            "harga_satuan" => 100000,
        ]);

        Fasilitas::create([
            "nama_fasilitas" => "Wi-Fi",
            "harga_satuan" => 500000,
        ]);
    }
}
