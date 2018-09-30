<?php

namespace App\Service\Currency;

use App\Service\Csv\CsvFileParser;

class CurrencyConverter
{
    private const SCALE = 18;
    private $csvFileParser;
    private $csvData = '';

    public function __construct(CsvFileParser $csvFileParser)
    {
        $this->csvFileParser = $csvFileParser;
    }

    public function convertCurrency(string $fromCurrency, string $toCurrency, float $amount): string
    {
        if ($this->csvData === '') {
            $this->csvData = $this->csvFileParser->parseCsvContents();
        }

        [$from, $to] = $this->getCurrencyValues($this->csvData, $fromCurrency, $toCurrency);

        if ($fromCurrency === 'EUR') {
            return $this->fromEuro($to, $amount);
        } elseif ($toCurrency === 'EUR') {
            return $this->toEuro($from, $amount);
        } else {
            $euroAmount = $this->toEuro($from, $amount);

            return $this->fromEuro($to, $euroAmount);
        }
    }

    private function getCurrencyValues(array $csvData, string $fromCurrency, string $toCurrency): array
    {
        $fromCurrencyUcase = strtoupper($fromCurrency);
        $toCurrencyUcase = strtoupper($toCurrency);

        if (!array_key_exists($fromCurrencyUcase, $csvData) || !array_key_exists($toCurrencyUcase, $csvData)) {
            throw new \InvalidArgumentException('Invalid from | to currency provided!');
        }

        $from = $csvData[$fromCurrencyUcase];
        $to = $csvData[$toCurrencyUcase];

        return [$from, $to];
    }

    private function fromEuro(string $to, float $amount): string
    {
        return number_format($to * $amount, self::SCALE);
    }

    private function toEuro(string $from, float $amount = 1): string
    {
        return number_format($amount / $from, self::SCALE);
    }
}
