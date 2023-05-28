<?php

function fw_include($file, $path = ROOT, $fire = true) {

    $include = new FW_INCLUDE($file, $path, $fire);
    return $include;

}

?>