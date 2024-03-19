<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MenuKamarUserChart
{
    protected $chart2;

    public function __construct(LarapexChart $chart2)
    {
        $this->chart2 = $chart2;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $jumlahPengguna = User::selectRaw('count(*) as jumlah, role')
            ->groupBy('role')
            ->pluck('jumlah', 'role')
            ->toArray();


        $jumlahUser = $jumlahPengguna['user'] ?? 0;
        $jumlahAdmin = $jumlahPengguna['admin'] ?? 0;

        return $this->chart2->pieChart()
            ->setTitle('Jumlah Pengguna yang terdaftar')
            // ->setSubtitle('Tahun 2021')
            ->addData([$jumlahUser, $jumlahAdmin])
            ->setLabels(['User', 'Admin']);
    }
}
