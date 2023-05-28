<?php

$website->title = "My First Website";

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