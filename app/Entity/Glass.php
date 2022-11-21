<?php

namespace App\Entity;

use App\Interfaces\User\ActionsInterface;
use App\Interfaces\User\ProductInterface;

class Glass implements ProductInterface, ActionsInterface
{
    /**
     * @var ProductInterface[]
     */
    private array $products;
    /**
     * @var string
     */
    private string $currency;

    /**
     * @param array $products
     * @param string $currency
     */
    public function __construct(array $products, string $currency)
    {
        $this->products = $products;
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        $totalPrice = 0;
        foreach($this->products as $product)
        {
            $totalPrice += $product->getPrice();
        }
        return $this->convertCurrency($totalPrice);
    }

    /**
     * @param ProductInterface $product
     * @return void
     */
    public function add(ProductInterface $product): void
    {
        $this->products [] = $product;
    }

    /**
     * @param ProductInterface $product
     * @return void
     */
    public function remove(ProductInterface $product)
    {
        $this->products = array_filter($this->products, function ($productItem) use ($product){
            if($productItem !== $product)
            {
                return $productItem;
            }
            return null;
        });
    }

    /**
     * @param float $price
     * @return float
     */
    private function convertCurrency(float $price): float
    {
        return $this->getCurrencyRate() * $price;
    }

    /**
     * @return float
     */
    private function getCurrencyRate(): float
    {
        $currenciesRates = [
            'EUR' => 0.97,
            'GBP' => 0.84,
            'JOD' => 0.71,
            'JPY' => 140.34,
        ];

        return $currenciesRates[$this->currency] ?? 1;
    }

}
