<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Pesanan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PesananChart
{
    protected $chart3;

    public function __construct(LarapexChart $chart3)
    {
        $this->chart3 = $chart3;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = 12;
        for ($i = 1; $i <= $bulan; $i++) {
            $pesanan = Pesanan::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->sum('harga_pesanan');
            $datatotalharga[] = ($pesanan);
            $databulan[] = Carbon::create()->month($i)->format('F');
        }

        return $this->chart3->lineChart()
            ->setTitle('Data Pesanan')
            ->addData('Total Harga Pesanan', $datatotalharga)
            ->setXAxis($databulan);
    }
}
