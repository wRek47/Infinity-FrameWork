<?php

class Error {

    public $id = 0;

    public $title = "";
    public $description = "";

    public $errno = 0;
    public $code = null;
    public $type = "";

    public $microtime = 0;
    public $macrotime = 0;

    public function __construct() { }
    
    public function set_title($title) { $this->title = $title; }
    public function set_description($description) { $this->description = $description; }

    public function set_code($code) { $this->code = $code; }

    public function set_microtime() { $this->microtime = microtime(); }
    public function set_macrotime() { $this->macrotime = time(); }

}

?>