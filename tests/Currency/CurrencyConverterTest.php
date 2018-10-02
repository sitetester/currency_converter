<?php

namespace App\Tests\Currency;

use App\Service\Csv\CsvFileParser;
use App\Service\Currency\CurrencyConverter;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    /** @var CurrencyConverter */
    protected $currencyConverter;

    /**
     * See screenshots in /Resources directory to confirm the formula is correctly used in CurrencyConverter
     */
    public function testConvertCurrencyUsdToEur(): void
    {
        $convertedRate = $this->currencyConverter->convertCurrency('USD', 'EUR', 1);
        $this->assertEquals('0.861541642615295866', $convertedRate);

        $convertedRate = $this->currencyConverter->convertCurrency('USD', 'EUR', 5);
        $this->assertEquals('4.307708213076478998', $convertedRate);
    }

    /**
     * See screenshots in /Resources directory to confirm the formula is correctly used in CurrencyConverter
     */
    public function testConvertCurrencyEurToUsd(): void
    {
        $convertedRate = $this->currencyConverter->convertCurrency('EUR', 'USD', 1);
        $this->assertEquals('1.160709999999999908', $convertedRate);

        $convertedRate = $this->currencyConverter->convertCurrency('EUR', 'USD', 5);
        $this->assertEquals('5.803549999999999542', $convertedRate);
    }

    /**
     * See screenshots in /Resources directory to confirm the formula is correctly used in CurrencyConverter
     * I USD = 0.861543 EUR
     * 1 EUR = 0.890832 GBP
     * 0.861543 EUR = 0,767490073776 GBP (0.890832 GBP * 0.861543 EUR)
     */
    public function testConvertCurrencyUsdToGbp(): void
    {
        $convertedRate = $this->currencyConverter->convertCurrency('USD', 'GBP', 1);
        $this->assertEquals('0.767488864574269236', $convertedRate);
    }

    protected function setUp(): void
    {
        $csvParser = new CsvFileParser(__DIR__ . '/../Csv/Resources/testData.csv');
        $this->currencyConverter = new CurrencyConverter($csvParser);
    }
}
