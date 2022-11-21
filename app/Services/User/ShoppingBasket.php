<?php

namespace App\Services\User;



use App\Interfaces\User\ActionsInterface;
use App\Interfaces\User\ProductInterface;

class ShoppingBasket implements ActionsInterface
{
    /**
     * @var ProductInterface[]
     */
    private array $products = [];

    /**
     * @param ProductInterface $product
     * @return void
     */
    public function add(ProductInterface $product): void
    {
        $productsIds = array_column($this->products, 'id');
        if(in_array($product->getId(), $productsIds, true)) {
            $productKey = array_search($product->getId(), $productsIds, true);
            $currentProduct = $this->products[$productKey];
            $currentProduct->addAmount($product->getPrice());
        } else {
            $this->products[] = $product;
        }
    }

    /**
     * @param ProductInterface $product
     * @return mixed
     */
    public function remove(ProductInterface $product): mixed
    {
        $this->products = array_filter($this->products,
            static function ($item) use ($product){
                if($item !== $product)
                {
                    return $item;
                }
                return null;
            });
    }

    /**
     * @return ProductInterface[]
     */
    public function getAll(): array
    {
        return $this->products;
    }


}
