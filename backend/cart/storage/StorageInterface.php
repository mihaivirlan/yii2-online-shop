<?php
namespace app\cart\storage;

interface StorageInterface {
    public function load();

    public function save(array $items);
}