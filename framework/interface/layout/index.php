<?php

$website->title = "Your FrameWork";

$nav = new LayoutNav("Main Menu");

    $link = new NavLink("#", "Home");
    $nav->set_links($link); unset($link);

$website->layout->set_navigation("main", $nav);

?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $website->title; ?></title>
</head>

<body>
<header>
    <h1>This is FrameWork</h1>

    <nav>
<? foreach ($nav->links as $link): ?>
        <a href="<?= $link->href; ?>"><?= $link->text; ?></a>
<? unset($link); endforeach; ?>
    </nav>
</header>

<main>
    <p>Hello World.</p>
</main>
</body>
</html>