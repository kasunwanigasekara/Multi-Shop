<?php

namespace Multishop\controller;


class product{

    private int $code;
    private int $stock;
    private string $name;
    private float $price;

    public function __construct(int $code,string $name,float $price,int $stock)
    {
        $this->name=$name;
        $this->price=$price;
        $this->code=$code;
        $this->stock=$stock;
    }

    public function displayName():string
    {
        return $this->name;
    }

    public function displayPrice():float
    {
        return $this->price;
    }

    public function displayCode():int
    {
        return $this->code;
    }

    public function displayStock():int
    {
        return $this->stock;
    }






}

?>