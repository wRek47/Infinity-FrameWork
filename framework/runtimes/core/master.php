<?php

class FW_MASTERVERSE {

    public $interfaces = []; // $website
    public $pages = []; // $page

    public $scopes = []; // $user

    public function __construct() { }

    public function serve($target, $config) {
    
        $slave = new FW_POLYVERSE($config);
        $this->set_scope($target, $slave);
    
    }

    public function call($target, $range) { return $this->$range[$target]; }

    public function set_interface($target, $interface) {
    
        $this->interfaces[$target] = $interface;
    
    }

    public function set_page($page) {
    
        array_push($this->pages, $page);
    
    }

    public function set_scope($target, $scope) {
    
        $this->scopes[$target] = $scope;
    
    }

    public function get_user($target) { return $this->scopes[$target]; }

}

?>