<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;
use App\Models\Payment;
use Session;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartService
{
    protected $clientType, $user, $remmitance, $payment;

    public function __construct(
        ClientType $clientType,
        User $user,
        remmitance $remmitance,
        Payment $payment
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->remmitance = $remmitance;
        $this->payment = $payment;
    }

    public function getIndustrialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Industrial Monthly Remmitance.')
        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200');

        return $chart;
    }

    public function getMedicalChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Medical Monthly Remmitance.')
        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200');

        return $chart;
    }

    public function getCommercialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Commercial Monthly Remmitance.')
        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200');

        return $chart;
    }

    public function getResidentialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Residential Monthly Remmitance.')
        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200');

        return $chart;
    }


}


?>