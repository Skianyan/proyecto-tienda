<?php

namespace App\Models;
use Illuminate\Support\Facades\Session;
class Cart
{
    public $items = []; // Initialize as an empty array
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

    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this-> items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id) {
        if ($this->items && is_array($this->items)) {
            if ($this->items[$id]['qty'] > 1) {
                $this->items[$id]['qty']--;
                $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
                $this->totalQty--;
                $this->totalPrice -= $this->items[$id]['item']['price'];
            } else {
                $this->removeItem($id);
            }
    
            if (count($this->items) > 0) {
                Session::put('cart', $this);
            } else {
                $this->resetCart();
            }
        }
    }
    
    public function removeItem($id) {
        if ($this->items && is_array($this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
    
            if (count($this->items) == 0) {
                $this->resetCart();
            } else {
                Session::put('cart', $this);
            }
        }
    }
    
    public function resetCart() {
        $this->items = [];
        $this->totalQty = 0;
        $this->totalPrice = 0;
        Session::forget('cart');
    }
}
