<?php

namespace App\Controllers;

use App\Models\Panier;
use App\Models\Product;

class CartController {
    private $panier;

    public function __construct() {
        $this->panier = new Panier();
    }

    public function addToCart($productId, $quantity) {
        $this->panier->addItem($productId, $quantity);
    }

    public function removeFromCart($productId) {
        $this->panier->removeItem($productId);
    }

    public function updateCart($productId, $quantity) {
        $this->panier->updateItem($productId, $quantity);
    }

    public function viewCart() {
        $items = $this->panier->getItems();
       
    }

    public function checkout() {

        $this->panier->clear();

    }
}