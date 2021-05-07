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
    protected $user, $remmitance, $payment, $monthly, $yearly, $resident, $comm, $indust, $med;

    public function __construct(
        ClientType $clientType,
        User $user,
        Payment $payment,
        ResidentMonRemitService $resident,
        CommMonRemitService $comm,
        IndustMonRemitService $indust,
        MedMonRemitService $med,
        YearlyRemitService $yearly
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->payment = $payment;
        $this->resident = $resident;
        $this->comm = $comm;
        $this->indust = $indust;
        $this->med = $med;
        $this->yearly = $yearly;

    }

    public function getIndustrialChart()
    {
        $jan = $this->indust->getJan();
        $feb = $this->indust->getFeb();
        $mar = $this->indust->getMar();
        $apr = $this->indust->getApr();
        $may = $this->indust->getMay();
        $jun = $this->indust->getJun();
        $jul = $this->indust->getJul();
        $aug = $this->indust->getAug();
        $sept = $this->indust->getSept();
        $oct = $this->indust->getOct();
        $nov = $this->indust->getNov();
        $dec = $this->indust->getDec();

        $chart = (new LarapexChart)->barChart()
        ->setTitle('Industrial Monthly Remmitance for ' . date('Y'))
        ->addData('Industrial',  [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sept, $oct, $nov, $dec])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#ffc63b']);

        return $chart;
    }

    public function getMedicalChart()
    {
        $jan = $this->med->getJan();
        $feb = $this->med->getFeb();
        $mar = $this->med->getMar();
        $apr = $this->med->getApr();
        $may = $this->med->getMay();
        $jun = $this->med->getJun();
        $jul = $this->med->getJul();
        $aug = $this->med->getAug();
        $sept = $this->med->getSept();
        $oct = $this->med->getOct();
        $nov = $this->med->getNov();
        $dec = $this->med->getDec();

        $chart = (new LarapexChart)->barChart()
        ->setTitle('Medical Monthly Remmitance for ' . date('Y'))
        ->addData('Medical', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sept, $oct, $nov, $dec])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#FF0000']);
        
        return $chart;
    }

    public function getCommercialChart()
    {
        $jan = $this->comm->getJan();
        $feb = $this->comm->getFeb();
        $mar = $this->comm->getMar();
        $apr = $this->comm->getApr();
        $may = $this->comm->getMay();
        $jun = $this->comm->getJun();
        $jul = $this->comm->getJul();
        $aug = $this->comm->getAug();
        $sept =$this->comm->getSept();
        $oct = $this->comm->getOct();
        $nov = $this->comm->getNov();
        $dec = $this->comm->getDec();

        $chart = (new LarapexChart)->barChart()
        ->setTitle('Commercial Monthly Remmitance for ' . date('Y'))
        ->addData('Commercial',  [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sept, $oct, $nov, $dec])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
        ->setHeight('200')
        ->setColors(['#008080']);

        return $chart;
    }

    public function getResidentialChart()
    {
        $jan = $this->resident->getJan();
        $feb = $this->resident->getFeb();
        $mar = $this->resident->getMar();
        $apr = $this->resident->getApr();
        $may = $this->resident->getMay();
        $jun = $this->resident->getJun();
        $jul = $this->resident->getJul();
        $aug = $this->resident->getAug();
        $sept = $this->resident->getSept();
        $oct = $this->resident->getOct();
        $nov = $this->resident->getNov();
        $dec = $this->resident->getDec();
        $chart = (new LarapexChart)->barChart()
        ->setTitle('Residential Monthly Remmitance for ' . date('Y'))
        ->addData('residential', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sept, $oct, $nov, $dec])
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
        ->setTitle('Income of all category of users made in year '. Date('Y'))
        ->setSubtitle('Year '. Date('Y'))
        ->addData([$residential, $commercial, $industrial, $medical])
        ->setLabels(['Residential', 'Commercial', 'Industrial', 'Medical'])
        ->setColors(['#008000', '#008080', '#ffc63b', '#FF0000']);

        return $chart;
    }

}


?>