<?php

class FW_FILER {

    public $includes = [];

    public function __construct() {
    
        require_once ROOT . "framework/objects/filesystem/file.php";
        
        $file = new File("framework/objects/filesystem/include.php");
        require_once $file->string;
    
    }

    public function get_include($target) { return $this->includes[$target]->fetch(); }
    public function set_includes($target, $include) { $this->includes[$target] = $include; }

}

?>