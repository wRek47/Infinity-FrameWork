<?php

fw_include("framework/objects/layout/core.php");

$website->layout = new Layout;

$website->layout->set_theme("formal");

$include_a = fw_include("layout/index.php", ROOT, false);
$include_b = fw_include("framework/interface/layout/index.php", ROOT, false);
if (!$include_a->file->found): require_once $include_b->fetch();
else: require_once $include_a->fetch(); endif;
unset($include_a, $include_b);

foreach ($website->layout->files as $file):

    // handle fatal-errors
    # do conditional stuff

    // load existing website include, or run fatal-error
    if (!file_exists($file->string)): print "Error: No file found." . var_dump($file);
    else: require_once $file->string; endif;

unset($file); endforeach;

/* ?><pre><? var_dump($fw); ?></pre><? */

?>