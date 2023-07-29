<?php

namespace App\Helpers;

use App\Models\Currency;

class CurrencyConverter
{
    public static function convertToBaseCurrency($amount, $zone)
    {
        // Fetch the current zone's currency
        $currentZoneCurrency = Currency::where('code', $zone)->first();

        // Assuming USD as the base currency
        $baseCurrency = Currency::where('code', 'USD')->first();

        // Convert the amount to the base currency using the exchange rate
        $convertedAmount = $amount / $currentZoneCurrency->exchange_rate * $baseCurrency->exchange_rate;

        return $convertedAmount;
    }

}