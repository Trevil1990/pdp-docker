<?php
// Start the buffering
ob_start();

require_once '../vendor/autoload.php';
require_once 'layout.html';

use app\HandlerTarGz;

$select_type = $_POST["select_type"];
$name = htmlspecialchars($_POST["yourname"]);

if (isset($_POST["select_type"]) || isset($_POST["yourname"])) {
	$filename = $name . '.' . $select_type;
} else {
	$filename = 'unknown.env';
}

if (isset($_POST["text"])) {
	$text = htmlspecialchars($_POST["text"]);
} else {
	$text = md5(time());
}

// Get the content from html file
file_put_contents($filename, ob_get_contents());
//file_put_contents('index.html', ob_get_contents());

$handler = new HandlerTarGz();
$handler->Tararchive($filename);
//unlink('phpinfo.tar');

//unlink('phpinfo.tar.gz');