<?php

namespace App\Tests\Csv;

use App\Service\Csv\CsvFileParser;
use PHPUnit\Framework\TestCase;

class CsvFileParserTest extends TestCase
{
    /** @var CsvFileParser */
    private $csvFileParser;

    public function testParseCsvFile(): void
    {
        $parsedCsv = $this->csvFileParser->parseCsvContents();

        $this->assertCount(6, $parsedCsv);
        $this->assertArrayHasKey('EUR', $parsedCsv);
        $this->assertArrayHasKey('FKE', $parsedCsv);
    }

    protected function setUp(): void
    {
        $this->csvFileParser = new CsvFileParser(__DIR__ . '/Resources/testData.csv');
    }
}
