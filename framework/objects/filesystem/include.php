<?php

class FW_INCLUDE {

    public $file;
    public $path = "";

    public $active = true;
    public $found = false;
    public $fired = false;

    public function __construct($file, $path = ROOT, $fire = false) {
    
        $this->set_file($file);
        $this->set_path($path);

        if ($fire):
        
            $this->fired = true;
            require_once $this->fetch();
        
        endif;
    
    }

    public function fetch() {
    
        $this->active = true;

        $file = $this->path . $this->file->string;
        if (file_exists($this->path)): $this->found = true; endif;

        return $file;
    
    }

    public function set_file($file) {
    
        # if $file is set, and not $this->file, the solution to the error becomes the next step in the problem;
        # essentially telling the developer, how to write a code.
        # How did this break the 4th-wall? Is this like, logic-based optical illusions?
        # I suppose this is when websites can be programmed to observe illusions, at the risk of not
        # polynomially deciphering it;
        if (!is_object($file)): $this->file = new File($file);
        else: $this->file = $file; endif;
    
    }

    public function set_path($path) { $this->path = $path; }

}

?>