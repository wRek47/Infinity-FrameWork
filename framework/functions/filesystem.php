<?php

function pull_dir($folder) {

    $scan = scandir(ROOT . $folder);
    array_shift($scan); array_shift($scan);

    return $scan;

}

function pull_dir_tree($folder, $only = null) {

    $scan = pull_dir($folder);

    $tree = [];
    foreach ($scan as $value):
    
        if (is_dir($value)): $data = pull_dir_tree($folder . $value);
        else: $data = $folder . $value; endif;

        if ($only == "folders" AND is_dir($value)): array_push($tree, $data);
        elseif ($only == "files" AND is_file($value)): array_push($tree, $data);
        elseif (is_null($only)): array_push($tree, $data);
        endif;
    
    unset($value); endforeach;

    return $tree;

}

?>