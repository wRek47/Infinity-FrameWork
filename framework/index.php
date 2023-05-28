<?php

require_once "framework/core.php";

$fw = new FrameWork(E_ALL, "/");

$fw->get_workspace("FW_CLIENT", "user");
$fw->make_workspace("website", "framework/runtimes/core/router/website.php", "FW_WEBSITE", "site");

$website = $fw->ws->site;

require_once fw_include("framework/index.website.php", ROOT, false)->fetch();

?>