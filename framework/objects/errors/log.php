<?php

class ErrorLog {

    public $title = "";
    public $description = "";

    public $errors = [];

    public function __construct($title, $description) {
    
        $this->set_title($title);
        $this->set_description($description);
    
    }

    public function set_title($title) { $this->title = $title; }
    public function set_description($description) { $this->description = $description; }

    public function set_errors($error) { array_push($this->errors, $error); }

}

?>