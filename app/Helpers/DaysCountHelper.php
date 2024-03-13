<?php

namespace App\Helpers;

use DateTime;
use Carbon\Carbon;


class DaysCountHelper
{
    public static function formatDate($tglawal, $tglakhir, $jedacheckout)
    {
        $start = Carbon::parse($tglawal);
        $end = Carbon::parse($tglakhir);
        // $endjampergantiancheckout = $end->copy()->addMinutes($jedacheckout);

        // $totalinap = $start->diffInDays($endjampergantiancheckout);

        $bedahari = $start->diffInDays($end);
        $endbystart = $start->copy()->addDays($bedahari)->addMinutes($jedacheckout);
        $totalinap = $bedahari;
        if ($endbystart->isBefore($end)) {
            $totalinap += 1;
        }

        return $totalinap;
    }
    public static function jedacheckout()
    {
        $jedacheckoutdalammenit = 30;
        return $jedacheckoutdalammenit;
    }
    public static function jedaCheckIn()
    {
        $jedacheckindalamjam = 2;
        return $jedacheckindalamjam;
    }
    public static function jamPergantianCheckIn()
    {
        $jampergantiancheckin = '08:00:00';
        return $jampergantiancheckin;
    }
    public static function formateDateWithDeadline($jedacheckindalamjam, $jedacheckoutdalammenit, $jampergantiancheckin, $tglawal, $tglakhir)
    {

        $start = Carbon::parse($tglawal);
        $end = Carbon::parse($tglakhir);

        $startjampergantiancheckin = Carbon::parse(substr($tglawal, 0, 11) . $jampergantiancheckin);
        $endjampergantiancheckout = Carbon::parse(substr($tglakhir, 0, 11) . $jampergantiancheckin);

        $totalinap = 0;
        if ($start->isBefore($startjampergantiancheckin)) {
            $startjedajampergantiancheckin = $startjampergantiancheckin->copy()->subHour($jedacheckindalamjam);

            if ($start->isBefore($startjedajampergantiancheckin)) {
                $totalinap += 1;
            }
        }

        if ($end->isAfter($endjampergantiancheckout)) {
            $endjedajampergantiancheckout = $endjampergantiancheckout->copy()->addMinutes($jedacheckoutdalammenit);

            if ($end->isAfter($endjedajampergantiancheckout)) {
                $totalinap += 1;
            }
        }

        $totalinap += $startjampergantiancheckin->diffInDays($endjampergantiancheckout);

        return $totalinap;
    }
}
