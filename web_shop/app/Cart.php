<?php

namespace App;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($product)
    {
        $storeItem = [
            'item' => $product,
            'totalPrice' => 0,
            'totalQty' => 0
        ];

        #kiem tra ton tai
        if ($this->items && array_key_exists($product->id, $this->items)) {
                $storeItem = $this->items[$product->id];

        } else {
            $this->totalQty++;
        }

        $storeItem['totalQty']++;
        $storeItem['totalPrice'] += $product->price;

        #xu ly gio hang
        $this->items[$product->id] = $storeItem;
        $this->totalPrice += $product->price;
    }

    public function remove($product, $id)
    {
        $this->totalQty--;
        $this->totalPrice -= $product->items[$id]['totalPrice'];
        unset($this->items[$id]);
    }

    public function update($product, $newQty)
    {    
        if($this->items && array_key_exists($product->id, $this->items)){
            $storeNewItem = $this->items[$product->id];
            $oldTotalPrice = $storeNewItem['totalPrice'];
            $storeNewItem['totalQty'] = $newQty;
            $storeNewItem['totalPrice'] = $storeNewItem['totalQty'] * $storeNewItem['item']['price'];   
            $this->totalPrice += ($storeNewItem['totalPrice'] - $oldTotalPrice);
            $this->items[$product->id] = $storeNewItem;
        }
    }
}
