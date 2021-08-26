<?php

require_once '../vendor/autoload.php';
require_once 'layout.html';

use app\HandlerTarGz;

$select_type = $_POST["select_type"];
$name = htmlspecialchars(stripslashes(trim($_POST["yourname"])));

if (isset($_POST["select_type"]) || isset($_POST["yourname"])) {
	$filename = $name . '.' . $select_type;
}

if (isset($_POST["text"])) {
	$text = htmlspecialchars($_POST["text"]);
}

// Get the content from html file
file_put_contents($filename, $text);

$handler = new HandlerTarGz();
$handler->tararchive($filename);
unlink($filename);
unlink('info.tar');

//unlink('info.tar.gz');