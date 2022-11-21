<?php

namespace App\Interfaces\User;

interface ActionsInterface
{
    public function add(ProductInterface $product);
    public function remove(ProductInterface $product);
}
