<?php

class FW_SESSIONS {

    public $active = [];
    public $expired = [];

    public function __construct() {
    
        session_start();
    
    }

    public function load_active() {
    
        $sessions = [];

        foreach ($_SESSION as $key => $value):
        
            $session = new Session($key);

            array_push($sessions, $session);
        
        unset($key, $value); endforeach;

        $this->active = $sessions;
    
    }

    public function set_active($session) { array_push($this->active, $session); }
    public function set_expired($session) { array_push($this->expired, $session); }

}

?>