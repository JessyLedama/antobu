<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\TaxService;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $taxes = TaxService::taxes();

        if($taxes->isEmpty())
        {
            $taxDatas = [
                [
                    'name' => 'VAT',
                    'amount' => '16'
                ],
    
                [
                    'name' => 'WHT',
                    'amount' => '5'
                ],
    
                [
                    'name' => 'WHT',
                    'amount' => '2'
                ],
            ];

            foreach($taxDatas as $tax)
            {
                TaxService::store($tax);
            }
        }
    }
}
