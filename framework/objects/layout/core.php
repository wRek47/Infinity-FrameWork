<?php

class Layout {

    public $theme = "";
    public $files = [];

    public $navigation = [];
    public $multimedia = [];

    public function __construct() {
    
        // load dependencies
        fw_include("framework/objects/layout/file.php");
        fw_include("framework/objects/layout/navigation.php");
    
    }

    public function set_theme($theme) { $this->theme = $theme; }
    public function set_files($file) { array_push($this->files, $file); }

    public function get_file($key, $target = "name") { return array_query($this->files, $key, $target); }

    public function set_navigation($key, $nav) { $this->navigation[$key] = $nav; }
    public function set_multimedia($media) { array_push($this->multimedia, $media); }

    public function get_media($key, $target) { return array_query($this->multimedia, $key, $target); }
    public function get_multimedia($key, $target) { return array_query_all($this->multimedia, $key, $target); }

    public function get_menu($key, $target) { return array_query($this->navigation, $key, $target); }
    public function get_navigation($key, $target) { return array_query_all($this->navigation, $key, $target); }

}

?>