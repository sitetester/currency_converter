<?php

namespace App\Controller;

use App\Service\Currency\CurrencyConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends AbstractController
{
    private $currencyConverter;

    public function __construct(CurrencyConverter $currencyConverter)
    {
        $this->currencyConverter = $currencyConverter;
    }

    /**
     * @Route("/currency/{fromCurrency}/{toCurrency}/{amount}", name="currency_index")
     *
     * @param string $fromCurrency
     * @param string $toCurrency
     * @param float $amount
     *
     * @return Response
     */
    public function index(string $fromCurrency, string $toCurrency, float $amount): Response
    {
        try {
            $result = $this->currencyConverter->convertCurrency($fromCurrency, $toCurrency, $amount);
            return new Response($result);
        } catch (\Exception $exception) {
            return new Response($exception->getMessage(), 400);
        }
    }
}
