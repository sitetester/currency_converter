<?php

namespace App\Service\Csv;

class CsvFileParser
{
    private $filePath;
    private $delimiter;

    public function __construct(string $filePath, string $delimiter = ',')
    {
        $this->filePath = $filePath;
        $this->delimiter = $delimiter;
    }

    public function parseCsvContents(): array
    {
        $parsedData = [];

        if (($handle = fopen($this->filePath, 'rb')) !== false) {
            while (($data = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
                $parsedData[$data[0]] = $data[1];
            }

            fclose($handle);
        }

        return $parsedData;
    }
}
