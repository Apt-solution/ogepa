<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientType;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientTypes =  [
            [
                'client_type' => 'residential',
                'sub_client_type' => 'room',
                'monthly_payment' => '200',
            ],
            [
                'client_type' => 'residential',
                'sub_client_type' => 'self_contain',
                'monthly_payment' => '500',
            ],
            [
                'client_type' => 'residential',
                'sub_client_type' => 'flat',
                'monthly_payment' => '750',
            ],
            [
                'client_type' => 'residential',
                'sub_client_type' => 'bungalow',
                'monthly_payment' => '1000',
            ],
            [
                'client_type' => 'residential',
                'sub_client_type' => 'duplex',
                'monthly_payment' => '1000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'minor_shop',
                'monthly_payment' => '300',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'commercial_bank',
                'monthly_payment' => '20000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'micro_finance_bank',
                'monthly_payment' => '10000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'school',
                'monthly_payment' => '2000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'shop',
                'monthly_payment' => '500',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'printing_shop',
                'monthly_payment' => '1000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'food_canteen',
                'monthly_payment' => '2000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'big_eatery',
                'monthly_payment' => '40000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'small_eatery',
                'monthly_payment' => '25000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'super_store',
                'monthly_payment' => '40000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'medium_store',
                'monthly_payment' => '20000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'mini_supermarket',
                'monthly_payment' => '5000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'religion_center',
                'monthly_payment' => '2000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'fuel_station',
                'monthly_payment' => '5000',
            ],
            [
                'client_type' => 'commercial',
                'sub_client_type' => 'bakery',
                'monthly_payment' => '5000',
            ],
            [
                'client_type' => 'medical',
                'sub_client_type' => 'hospital',
                'monthly_payment' => '5000',
            ],
            [
                'client_type' => 'industrial',
                'sub_client_type' => '10_ton',
                'monthly_payment' => '60000',
            ],
            [
                'client_type' => 'industrial',
                'sub_client_type' => '15_20_ton',
                'monthly_payment' => '90000',
            ],
            [
                'client_type' => 'industrial',
                'sub_client_type' => 'compactor',
                'monthly_payment' => '150000',
            ],

        ];

        ClientType::insert($clientTypes);
    }
}
