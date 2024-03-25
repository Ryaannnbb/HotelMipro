<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kamar::create([
            'nama_kamar' => 'Superior Room',
            'path_kamar' => 'kamar-6.jpg',
            'path_kamar1' => 'kamar-5.jpg',
            'path_kamar2' => 'kamar-4.jpg',
            'harga' => '899000',
            'kategori_id' => '6',
            'deskripsi' => 'A spacious and elegantly designed room with modern amenities, ideal for guests seeking a luxurious experience during their stay.',
            'status' => 'available',
        ]);

        Kamar::create([
            'nama_kamar' => 'Deluxe Room',
            'path_kamar' => 'kamar-5.jpg',
            'path_kamar1' => 'kamar-4.jpg',
            'path_kamar2' => 'kamar-3.jpg',
            'harga' => '649000',
            'kategori_id' => '2',
            'deskripsi' => 'Experience comfort and style in our Deluxe Room, featuring plush furnishings and stunning decor, perfect for discerning travelers looking for a premium accommodation option.',
            'status' => 'available',
        ]);

        Kamar::create([
            'nama_kamar' => 'Suite Room',
            'path_kamar' => 'kamar-4.jpg',
            'path_kamar1' => 'kamar-3.jpg',
            'path_kamar2' => 'kamar-2.jpg',
            'harga' => '499000',
            'kategori_id' => '3',
            'deskripsi' => 'Indulge in luxury with our Suite Room, offering ample space, separate living areas, and exquisite amenities, catering to guests desiring a lavish and relaxing retreat.',
            'status' => 'available',
        ]);

        Kamar::create([
            'nama_kamar' => 'Family Room',
            'path_kamar' => 'kamar-3.jpg',
            'path_kamar1' => 'kamar-2.jpg',
            'path_kamar2' => 'kamar-1.jpg',
            'harga' => '749000',
            'kategori_id' => '4',
            'deskripsi' => 'Our Family Room is designed to accommodate families comfortably, offering spacious accommodations, child-friendly amenities, and a welcoming ambiance, ensuring a memorable and enjoyable stay for guests traveling with loved ones.',
            'status' => 'available',
        ]);

        Kamar::create([
            'nama_kamar' => 'Executive Room',
            'path_kamar' => 'kamar-2.jpg',
            'path_kamar1' => 'kamar-1.jpg',
            'path_kamar2' => 'kamar-6.jpg',
            'harga' => '1499000',
            'kategori_id' => '5',
            'deskripsi' => 'Our Executive Room offers the epitome of luxury and sophistication, featuring exclusive amenities, breathtaking views, and personalized service, tailored to meet the discerning needs of business executives and VIP guests seeking an unparalleled stay experience.',
            'status' => 'available',
        ]);

        Kamar::create([
            'nama_kamar' => 'Standard Room',
            'path_kamar' => 'kamar-1.jpg',
            'path_kamar1' => 'kamar-6.jpg',
            'path_kamar2' => 'kamar-5.jpg',
            'harga' => '399000',
            'kategori_id' => '1',
            'deskripsi' => 'Enjoy a comfortable stay in our Standard Room, featuring essential amenities and a welcoming atmosphere, suitable for guests seeking quality accommodation at an affordable price point.',
            'status' => 'available',
        ]);
    }
}
