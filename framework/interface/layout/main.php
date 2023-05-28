<?php

fw_include("framework/runtimes/core/router/webpage.php");

$config = new FW_WEBPAGE;

$fw->master->set_scope("FW_WEBPAGE", $config);
$fw->get_workspace("FW_WEBPAGE", "page");

?>