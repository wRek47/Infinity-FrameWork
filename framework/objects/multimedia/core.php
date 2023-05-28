<?php

class Multimedia {

    public $items = [];

    public function __construct() { }

    public function set_items($item) { array_push($this->items, $item); }

}

?>