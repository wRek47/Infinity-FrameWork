<?php

class FW_CLIENT {

    public $id = 0;

    public $ip = "";
    public $browser = "";
    public $os = "";

    public function __construct() { }

    public function set_ip() { $this->ip = get_ip_address(); }
    public function set_browser() { $this->browser = get_browser_specs(); }
    public function set_os() { $this->os = get_os_specs(); }

}

?>