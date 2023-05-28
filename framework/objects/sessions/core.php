<?php

class Session {

    public $key = "";
    public $value = "";

    public function __construct($key, $value = "") {
    
        $this->set_key($key);
        $this->set_value($value);
    
    }
    
    public function open($force = false) {
    
        $key = $this->key;

        if ($force):
        
            if (!isset($_SESSION[$key])): $_SESSION[$key] = $this->value; endif;
            return $_SESSION[$key];
        
        else: return isset($_SESSION[$key]) ? $_SESSION[$key] : false; endif;
    
    }

    public function get_value($save = false) {
    
        $value = $this->open();
        if ($save): $this->value = $value; endif;

        return $value;
    
    }

    public function save($override = false) {
    
        $key = $this->key;
        $value = $this->value;

        if (!isset($_SESSION[$key]) OR $override): $_SESSION[$key] = $value; endif;
    
    }

}

?>