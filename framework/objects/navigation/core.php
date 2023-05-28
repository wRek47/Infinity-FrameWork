<?php

class Nav {

    public $id = 0;

    public $title = "";
    public $description = "";

    public $items = [];
    public $links = [];

    public function __construct($title, $description = "") {
    
        fw_include("framework/objects/navigation/link.php");

        $this->set_title($title);
        $this->set_description($description);
    
    }

    public function set_title($title) { $this->title = $title; }
    public function set_description($description) { $this->description = $description; }

    public function set_items($item) { array_push($this->items, $item); }
    public function set_links($link) { array_push($this->links, $link); }

}

?>