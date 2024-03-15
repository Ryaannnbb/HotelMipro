<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Kamar;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KategorikamarChart
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart1 = $chart1;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = date('Y');
        $bulan = 12;
        $kategoriList = Kategori::pluck('nama_kategori')->toArray();
        $dataKategori = [];

        for ($i = 1; $i <= $bulan; $i++){
            $kategoriCount = [];
            foreach ($kategoriList as $kategori) {
                $count = Kamar::whereHas('kategori', function ($query) use ($tahun, $i, $kategori) {
                                $query->where('nama_kategori', $kategori);
                            })->whereYear('created_at', $tahun)
                              ->whereMonth('created_at', $i)
                              ->count();
                $kategoriCount[] = $count;
            }
            $dataKategori[] = $kategoriCount;
        }

        // Array warna untuk setiap kategori
        $colors = ['#FF5733', '#FFC300', '#DAF7A6', '#C70039', '#900C3F', '#3D0C02', '#8D021F', '#FF5733', '#FFC300', '#DAF7A6', '#C70039', '#900C3F'];

        $chart = $this->chart1->barChart()
            ->setTitle('Kategori Kamar')
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);

        // Tambahkan data untuk setiap kategori dengan warna yang sesuai
        foreach ($kategoriList as $index => $kategori) {
            $chart->addData($kategori, $dataKategori[$index], $colors[$index]);
        }

        return $chart;
    }
}
