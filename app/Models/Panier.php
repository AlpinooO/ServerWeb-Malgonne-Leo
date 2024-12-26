<?php

namespace App\Models;

class Panier {
    private $items = [];

    public function addItem($productId, $quantity) {
        if (isset($this->items[$productId])) {
            $this->items[$productId] += $quantity;
        } else {
            $this->items[$productId] = $quantity;
        }
    }

    public function removeItem($productId) {
        unset($this->items[$productId]);
    }

    public function updateItem($productId, $quantity) {
        if ($quantity <= 0) {
            $this->removeItem($productId);
        } else {
            $this->items[$productId] = $quantity;
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function clear() {
        $this->items = [];
    }

    public function getTotal($products) {
        $total = 0;
        foreach ($this->items as $productId => $quantity) {
            if (isset($products[$productId])) {
                $total += $products[$productId]->getPrice() * $quantity;
            }
        }
        return $total;
    }
}