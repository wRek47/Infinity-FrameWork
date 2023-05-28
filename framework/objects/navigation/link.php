<?php

class NavLink {

    public $id = 0;
    public $nav_id = 0;
    
    public $href = "";
    public $text = "";

    public function __construct($href, $text) {
    
        $this->set_href($href);
        $this->set_text($text);
    
    }

    public function set_href($href) { $this->href = $href; }
    public function set_text($text) { $this->text = $text; }

}

?>