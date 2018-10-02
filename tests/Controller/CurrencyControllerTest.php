<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CurrencyControllerTest extends WebTestCase
{
    public function testIndexWithValidArguments(): void
    {
        $client = static::createClient();

        $client->request('GET', '/currency/EUR/USD/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $content = json_decode($client->getResponse()->getContent());
        $this->assertEquals('0.809552721999999947', $content->result);
    }

    public function testIndexWithInValidArguments(): void
    {
        $client = static::createClient();

        // notice `USD3` as bad currency
        $client->request('GET', '/currency/EUR/USD3/1');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $content = json_decode($client->getResponse()->getContent());
        $this->assertEquals('Invalid from | to currency provided!', $content->error);
    }
}
