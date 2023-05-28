<?php

class File {

    public $string = "";

    public $name = "";
    public $folder = "";

    public $path = "";

    public $created = "";
    public $updated = "";
    public $chmod = "";

    public $found = false;

    public function __construct($file, $set_name = false, $set_folder = false, $set_path = false) {
    
        $this->string = $file;
        $this->fetch();

        if ($set_name): $this->get_name(true); endif;
        if ($set_folder): $this->get_folder(true); endif;
        if ($set_path): $this->get_path(true); endif;
    
    }
    
    public function fetch() {
    
        $file = $this->path . $this->string;
        if (file_exists($file)): $this->found = true; endif;

        return $file;
    
    }

    public function get_name($save = false) {
    
        $array = explode("/", $this->string);
        $name = end($array); unset($array);

        if ($save): $this->name = $name; endif;

        return $name;
    
    }

    public function get_folder($save = false) {
    
        $string = strrpos($this->string, "/");
        $string = strrpos($string, "/");

        $folder = $string;

        if ($save): $this->folder = $folder; endif;

        return $folder;
    
    }

    public function get_path($save = false) {
    
        $string = strrpos($this->string, "/");
        $path = $string;

        if ($save): $this->path = $path; endif;

        return $path;
    
    }

}

?>