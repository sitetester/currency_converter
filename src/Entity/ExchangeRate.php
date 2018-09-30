<?php

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CurrencyRepository")
 */
class ExchangeRate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fromCurrency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $toCurrency;

    /**
     * @ORM\Column(type="decimal", precision=25, scale=18)
     */
    private $exchangeRate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromCurrency(): ?string
    {
        return $this->fromCurrency;
    }

    public function setFromCurrency(string $fromCurrency): self
    {
        $this->fromCurrency = $fromCurrency;

        return $this;
    }

    public function getToCurrency(): ?string
    {
        return $this->toCurrency;
    }

    public function setToCurrency(string $toCurrency): self
    {
        $this->toCurrency = $toCurrency;

        return $this;
    }

    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate($exchangeRate): self
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date)
    {
        $this->date = $date;

        return $this;
    }
}
