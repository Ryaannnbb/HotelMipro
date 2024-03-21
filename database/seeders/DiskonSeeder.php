<?php

namespace Database\Seeders;

use App\Models\Diskon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiskonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diskon::create([
            'nama_diskon' => 'Diskon Hari Natal',
            'gambar' => 'diskon-100k.png',
            'jenis' => 'nominal',
            'potongan_harga' => '100000',
            'awal_berlaku' => '2024-03-20',
            'akhir_berlaku' => '2024-03-25',
            'deskripsi' => 'Nikmati diskon khusus Natal dengan potongan harga 20% untuk mengisi liburan Anda dengan kebahagiaan dan kenyamanan di hotel kami. Sambut Natal dengan suasana yang hangat dan layanan yang ramah dari tim kami!',
            'kategori_id' => '2',
        ]);
        Diskon::create([
            'nama_diskon' => 'Diskon Tahun Baru',
            'gambar' => 'diskon-90%.jpg',
            'jenis' => 'percentage',
            'potongan_harga' => '90',
            'awal_berlaku' => '2024-01-01',
            'akhir_berlaku' => '2024-01-10',
            'deskripsi' => 'Sambut Tahun Baru dengan hemat di hotel kami! Dapatkan diskon spesial sebesar Rp 150.000 untuk setiap pemesanan kamar Anda. Jadikan malam Tahun Baru Anda lebih berkesan dengan menginap bersama kami dan menikmati fasilitas terbaik yang kami tawarkan.',
            'kategori_id' => '5',
        ]);
    }
}
