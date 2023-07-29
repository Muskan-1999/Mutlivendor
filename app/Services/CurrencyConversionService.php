<?php
namespace App\Services;

class CurrencyConversionService
{
    public function convert($amount, $sourceCurrency, $targetCurrency)
    {
       

        // Assuming $sourceCurrency is USD and $targetCurrency is INR
        $conversionRate = 75;
        $convertedAmount = $amount * $conversionRate;

        return $convertedAmount;
    }
}