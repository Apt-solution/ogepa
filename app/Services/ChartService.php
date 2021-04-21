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
        ->addData('San Francisco', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#ffc63b']);

        return $chart;
    }

    public function getMedicalChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Medical Monthly Remmitance.')
        ->addData('San Francisco', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#FF0000']);

        return $chart;
    }

    public function getCommercialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Commercial Monthly Remmitance.')
        ->addData('San Francisco', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008080']);

        return $chart;
    }

    public function getResidentialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Residential Monthly Remmitance.')
        ->addData('San Francisco', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008000']);

        return $chart;
    }


}


?>