<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembayaran::create([
            "metode_pembayaran" => "e-wallet",
            "tujuan" => "Gopay",
            "keterangan" => "cAPzEVQIS7PlPWaIAkiJp0mvlGj4Hilf77LZES9t.jpg",
            "nama_ewallet" => "yunikamiasti",
        ]);
    }
}