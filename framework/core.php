<?php

class FrameWork {

    public $version = "2.0";

    public $errors = null;
    public $sessions = null;
    public $filesys = null;

    public $master = null;

    public $ws = null;

    public function __construct($error_level, $base_dir = "/", $config = null) {
    
        $this->load_assets();

        $this->errors = new FW_ERRORS($error_level);
        $this->sessions = new FW_SESSIONS;

        $this->filesys = new FW_FILER($base_dir);

        $this->master = new FW_MASTERVERSE;

        $user = new FW_CLIENT;
        $this->master->set_scope("FW_CLIENT", $user);
    
    }

    public function include($target, $file, $return = false, $save = true) {
    
        $this->set_include($target, $file);
        $include = $this->get_include($target);

        if ($return):
        
            if ($save): /* do stuff */ endif;
            
            return $include;
        
        else:
        
            if ($save): /* do stuff */ endif;
            return true;
        
        endif;
    
    }

    public function load_assets() {
    
        require_once "framework/definitions/global.php";
        # require_once ROOT . "framework/variables/global.php";
        require_once ROOT . "framework/functions/global.php";
        # require_once ROOT . "framework/objects/global.php";
        # require_once ROOT . "framework/runtimes/global.php";

        $files = [
            "error/core.php",
            "session/core.php",
            "filer/core.php",
            "master.php",
            "router/user.php",
            "slave.php"
        ];

        foreach ($files as $file):
        
            require_once ROOT . "framework/runtimes/core/" . $file;
        
        unset($file); endforeach;
    
    }

    public function call($workspace, $target) {
    
        $result = $this->get_workspace($workspace)->call($target);

        return $result;
    
    }

    public function make_workspace($include_target, $include_file, $runtime_workspace, $runtime_target) {
    
        $this->set_include($include_target, $include_file);
        require_once $this->get_include($include_target);

        $config = new $runtime_workspace;
        $this->master->set_scope($runtime_workspace, $config);
        $this->get_workspace($runtime_workspace, $runtime_target);
    
    }

    public function get_workspace($target, $save = false) {
    
        if ($save):
        
            if (!is_object($this->ws)): $this->ws = (object) array(); endif; 
            $this->ws->$save = $this->master->scopes[$target];
        
        else: return $this->master->scopes[$target]; endif;
    
    }

    public function get_user_data($target) { $this->master->get_user($target); }

    public function get_include($target) { return $this->filesys->get_include($target); }

    public function set_include($target, $file, $path = ROOT) {
    
        $include = new FW_INCLUDE($file, $path);
        $this->filesys->set_includes($target, $include);
    
    }

    public function infinity_call($workspace, $array) {
    
        $function = '$this->get_workspace(' . $workspace . ')';

        foreach ($array as $row):
        
            $function .= '->call(' . $row . ')';
        
        unset($row); endforeach;

        $function .= ';';

        $result = eval($function);

        return $result;
    
    }

    public function paired_infinity_call($object) {
    
        $workspace = $object->workspace;
        $calls = $object->calls;

        if (!is_object($calls) AND !is_array($calls)): $result = $this->call($workspace, $calls);
        else: $result = $this->infinity_call($workspace, $calls); endif;

        return $result;
    
    }

    public function complex_infinity_call($array) {
    
        $result = [];

        foreach ($array as $key => $data):
        
            foreach ($data as $row_id => $row):
            
                foreach ($row->calls as $call_id => $call):
                
                    // do stuff

                unset($call_id, $call); endforeach;
            
            unset($row_id, $row); endforeach;
        
        unset($key, $data); endforeach;

        return $result;
    
    }

    public function folded_infinity_call($data) {
    
        $result = [];
        
        foreach ($data as $key => $row):
        
            if (is_object($row)):
            
                if (isset($row->calls)):
                
                    # is this the right function?
                    $result[$key] = $this->paired_infinity_call($row);
                
                else:
                
                    # what does the value look like?
                    if (!isset($result[$key])): $result[$key] = $this->infinity_call($key, $row); endif;
                
                endif;
            
            elseif (is_array($row)): $result[$key] = $this->infinity_call($key, $row);
            else: $result[$key] = $this->call($key, $row);
            endif;
        
        unset($key, $row); endforeach;

        return $result;
    
    }

}

?>