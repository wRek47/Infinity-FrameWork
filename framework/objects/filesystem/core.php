<?php

class FileSystem {

    public $scan = [];
    public $tree = [];

    public $folders = [];
    public $files = [];

    public function __construct() {
    
        $this->set_tree();

        $this->set_folders();
        $this->set_files();
    
    }

    public function set_folders() {
    
        $folders = pull_dir_tree(ROOT, "folders");
        $this->folders = $folders;
    
    }

    public function set_files() {
    
        $files = pull_dir_tree(ROOT, "files");
        $this->files = $files;
    
    }

    public function set_tree() { 
    
        $tree = pull_dir_tree(ROOT);
        $this->tree = $tree;
    
    }

}

?>