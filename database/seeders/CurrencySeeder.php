<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    
        
        Currency::create([
        'code' => 'USD',
        'exchange_rate' => 1.00, // USD as the base currency
    ]);

    Currency::create([
        'code' => 'EUR',
        'exchange_rate' => 0.85, // Exchange rate relative to USD (EUR to USD)
    ]);


        
    }
}
