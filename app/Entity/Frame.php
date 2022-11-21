<?php
declare(strict_types=1);

namespace App\Entity;

use App\Interfaces\User\ProductInterface;

class Frame implements ProductInterface
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var string
     */
    private string $status;
    /**
     * @var int
     */
    private int $stock;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var string
     */
    private string $currency;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $status
     * @param int $stock
     * @param float $price
     * @param string $currency
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        string $status,
        int $stock,
        float $price,
        string $currency
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
        $this->stock = $stock;
        $this->price = $price;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string{
       return $this->description;
   }

    /**
     * @return string
     */
    public function getStatus(): string{
        return $this->status;
    }

    /**
     * @return int
     */
    public function getStock(): int{
        return $this->stock;
    }

    /**
     * @return float
     */
    public function getPrice(): float{
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string{
        return $this->currency;
    }
}
