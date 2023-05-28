<?php

class LayoutFile extends File {

    public $order = 1;

    public function __construct($order, $file) {
    
        $this->set_order($order);
        $this->string = $file;
    
    }

    public function set_order($increment) { $this->order = $increment; }

}

?>