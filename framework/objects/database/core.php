<?php

class Database {

    public $connections = [];

    public function __construct() { }

    public function get($name) { array_query($this->connections, $name, "name"); }

    public function open($host, $user, $pass, $name) {
    
        $result = new DB_Connect($host, $user, $pass, $name);
        array_push($this->connections, $result);
    
    }

}

class DB_Connect {

    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $name = "";

    public $port = null;
    public $socket = null;

    public $query = null;

    public function __construct($host, $user, $pass, $name, $port = null, $socket = null) {
    
        $this->set_host($host);
        $this->set_user($user);
        $this->set_pass($pass);
        $this->set_name($name);
        $this->set_port($port);
        $this->set_socket($socket);

        $query = new mysqli($this->host, $this->user, $this->pass, $this->name, $this->port, $this->socket);
        $this->query = $query;
    
    }

    public function set_host($host) { $this->host = $host; }
    public function set_user($user) { $this->user = $user; }
    public function set_pass($pass) { $this->pass = $pass; }
    public function set_name($name) { $this->name = $name; }

    public function set_port($port) { $this->port = $port; }
    public function set_socket($socket) { $this->socket = $socket; }

}

?>