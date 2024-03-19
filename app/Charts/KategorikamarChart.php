<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Pesanan;
use App\Models\Kategori;
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

    // Menginisialisasi array untuk menyimpan jumlah kategori per bulan
    $jumlahKategori = array_fill(0, $bulan, []);

    for ($i = 1; $i <= $bulan; $i++){
        $databulan[] = Carbon::create()->month($i)->format('F');

        foreach ($kategoriList as $index => $kategori) {
            $count = Pesanan::whereHas('kategori', function ($query) use ($tahun, $i, $kategori) {
                            $query->where('nama_kategori', $kategori);
                        })->whereYear('created_at', $tahun)
                          ->whereMonth('created_at', $i)
                          ->count();
            $dataKategori[$index][] = $count;

            // Menambahkan jumlah kategori untuk bulan saat ini
            $jumlahKategori[$i - 1][$kategori] = $count;
        }
    }

    // Array warna untuk setiap kategori
    $colors = ['#FF5733', '#FFC300', '#DAF7A6', '#C70039', '#900C3F', '#3D0C02', '#8D021F', '#FF5733', '#FFC300', '#DAF7A6', '#C70039', '#900C3F'];

    $chart = $this->chart1->barChart()
    ->setTitle('Jumlah Pesanan Berdasarkan kategori')
    ->setXAxis(array_map(function ($bulan) {
        return Carbon::create()->month($bulan)->format('F');
    }, range(1, $bulan)))
    ->setLabels(array_map(function ($bulan) {
        return Carbon::create()->month($bulan)->format('F');
    }, range(1, $bulan)));

    // Tambahkan data untuk setiap kategori dengan warna yang sesuai
    foreach ($kategoriList as $index => $kategori) {
        $chart->addData($kategori, $dataKategori[$index], $colors[$index]);
    }

    return $chart;
}
}
