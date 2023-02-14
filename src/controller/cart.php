<?php

namespace Multishop\controller;
use Multishop\model\manageProducts;

class cart{

    private string $name;
    private array $cart;

    public function __construct(string $name)
    {
        $this->name=$name;
    }

    public function addProductToCart( product $product)
    {
        $this->cart[]=$product;
    }

    public function viewProduct()
    {
        return $this->cart;
    }



}

?>