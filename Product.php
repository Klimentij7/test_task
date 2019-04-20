<?php
require 'sizeProducts.php';
require 'dimProducts.php';
require 'weightProducts.php';
class Product
{
    private $sku = null;
    private $name = null;
    private $price = null;
    private $type = null;

    public function __construct($s = null, $n = null, $p = null, $t = null)
    {
        $this->sku = $s;
        $this->name = $n;
        $this->price = $p;
        $this->type = $t;
    }

    public function getSku() { return $this->sku; }
    public function getPrice() { return $this->price; }
    public function getName() { return $this->name; }
}