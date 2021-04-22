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
        ->setTitle('Industrial Monthly Remmitance for ' . date('Y'))
        ->addData('Industrial', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#ffc63b']);

        return $chart;
    }

    public function getMedicalChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Medical Monthly Remmitance for ' . date('Y'))
        ->addData('Medical', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#FF0000']);

        return $chart;
    }

    public function getCommercialChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Commercial Monthly Remmitance for ' . date('Y'))
        ->addData('Commercial', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008080']);

        return $chart;
    }

    public function getResidentialChart()
    {
        $month = $this->getMonthRemmitance();
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Residential Monthly Remmitance for ' . date('Y'))
        ->addData('residential', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008000']);

        return $chart;
    }

    public function allClientTypeChart()
    {
        $month = $this->getMonthRemmitance();
        $chart = (new LarapexChart)->pieChart()
        ->setTitle('Income Generated for '. date('M-Y'))
        ->setSubtitle(date('M-Y'))
        ->addData([1000, 2000, 3000, 500])
        ->setLabels(['Residential', 'Commercial', 'Industrial', 'Medical'])
        ->setHeight('300');

        return $chart;
    }

    private function getMonthRemmitance()
    {
        return $this->payment->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->sum('amount');
    }

}


?>