<?php

$website->set_title("Welcome to FrameWork");
$nav = $website->layout->navigation;

?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $website->title; ?></title>
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="assets/html/bootstrap/bootstrap.min.css" />
    <script type="text/javascript" src="assets/html/bootstrap/bootstrap.min.js"></script>
</head>

<body>

<header>
    <h1><?= $website->title; ?></h1>
    <nav>
<? $data = $nav['main']; foreach ($data->links as $link): ?>
        <a href="<?= $link->href; ?>"><?= $link->text; ?></a>
<? unset($link); endforeach; unset($data); ?>
    </nav>
</header>