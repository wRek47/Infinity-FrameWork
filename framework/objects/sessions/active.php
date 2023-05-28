<?php

class ActiveSession extends Session {

    public $key = "";
    public $value = "";

    public function __construct($key, $override = false) {
    
        $this->set_key($key);
        $this->get_value($override);
    
    }

}

?>