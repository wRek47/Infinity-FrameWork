<?php

class FW_POLYVERSE extends FW_MASTERVERSE {

    public $config = [];

    public $pages = [];
    public $interfaces = [];

    // do we acknowledge scopes?

    public function __construct($data) {
    
        foreach ($data as $key => $value):
        
            $this->config[$key] = $value;
        
        unset($key, $value); endforeach;
    
    }

}

?>