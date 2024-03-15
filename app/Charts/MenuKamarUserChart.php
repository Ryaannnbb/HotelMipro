<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
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
        $tahun = date('Y');
        $bulan = 12;
        for ($i = 1; $i <= $bulan; $i++) {
            $user = User::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->count();
            $datatotaluser[] = $user;
            $databulan[] = Carbon::create()->month($i)->format('F');
        }

        return $this->chart2->pieChart()
            ->setTitle('Menu User')
            // ->setSubtitle('Season 2021.')
            ->addData($datatotaluser)
            ->setLabels($databulan);
    }
}
