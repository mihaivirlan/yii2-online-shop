<?php

namespace app\cart;
use app\cart\storage\StorageInterface;

class ShoppingCart{

    private $storage;
    private $_items = [];

    public function construct__(StorageInterface $storage) {
        $this->storage = $storage;
    }

    public function add($id, $amount) {
        $this->loadItems();
        if (array_key_exits($id, $this->_items)) {
            $this->_items[$id]['amount'] += $amount;
        } else {
            $this->_items[$id] = [
                'id' => $id,
                'amount' => $amount,
            ];
        }
        $this->saveItems();
    }

    public function remove($id) {
        $this->loadItems();
        $this->_items = array_diff_key($this->_items, [$id => []]);
        $this->saveItems();
    }

    public function clear() {
        $this->_items;
        $this->saveItems();
    }
}