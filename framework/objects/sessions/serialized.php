<?php

class SerialSession extends Session {

    public $data = "";

    public function __construct($key, $value = "") {
    
        $this->data = $value;
        $this->value = serialize($value);
    
    }

}

?>