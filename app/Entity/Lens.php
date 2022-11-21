<?php
declare(strict_types=1);

namespace App\Entity;

use App\Interfaces\User\ProductInterface;

class Lens implements ProductInterface
{

    private int $id;

    /**
     * @var string
     */
    private string $colour;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var string
     */
    private string $prescription_type;
    /**
     * @var string
     */
    private string $lens_type;
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
     * @param string $colour
     * @param string $description
     * @param string $prescription_type
     * @param string $lens_type
     * @param int $stock
     * @param float $price
     * @param string $currency
     */
    public function __construct(
        int $id,
        string $colour,
        string $description,
        string $prescription_type,
        string $lens_type,
        int $stock,
        float $price,
        string $currency
    )
    {
        $this->id = $id;
        $this->colour = $colour;
        $this->description = $description;
        $this->prescription_type = $prescription_type;
        $this->lens_type = $lens_type;
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
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPrescriptionType(): string
    {
        return $this->prescription_type;
    }

    /**
     * @return string
     */
    public function getLensType(): string
    {
        return $this->lens_type;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }


}
