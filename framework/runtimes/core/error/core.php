<?php

class FW_ERRORS {

    public $level = "E_ALL";

    public $errors = [];

    public function __construct($level = "E_ALL") {
    
        $this->level = $level;
        error_reporting($level);
    
    }

    public function set_errors($error) { array_push($this->errors, $error); }

}

?>