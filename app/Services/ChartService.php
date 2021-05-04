<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;
use App\Models\Payment;
use Session;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Services\ResidentMonRemitService;
use App\Services\YearlyRemitService;

class ChartService
{
    protected $user, $remmitance, $payment, $monthly, $yearly;

    public function __construct(
        ClientType $clientType,
        User $user,
        Payment $payment,
        ResidentMonRemitService $resident,
        YearlyRemitService $yearly
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->payment = $payment;
        $this->resident = $resident;
        $this->yearly = $yearly;

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
        $apr = $this->resident->getApr();
        $may = $this->resident->getMay();
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Residential Monthly Remmitance for ' . date('Y'))
        ->addData('residential', [1, 2, 3, $apr, $may, 6, 7, 8, 9, 10, 11 ,12])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008000']);

        return $chart;
    }

    public function allClientTypeChart()
    {
        $residential = $this->yearly->residentialYearlyRemit();
        $commercial= $this->yearly->commercialYearlyRemit();
        $industrial = $this->yearly->industrialYearlyRemit();
        $medical = $this->yearly->medicalYearlyRemit();

        $chart = (new LarapexChart)->polarAreaChart()
        ->setTitle('Income of all Client Type made in year '. Date('Y'))
        ->setSubtitle('Year '. Date('Y'))
        ->addData([$residential, $commercial,$industrial, $medical])
         ->setLabels(['Residential', 'Commercial', 'Industrial', 'Medical']);

        return $chart;
    }

}


?>