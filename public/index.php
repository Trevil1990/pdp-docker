<?php
// Start the buffering
ob_start();

require_once '../vendor/autoload.php';
require_once 'layout.html';

use app\HandlerTarGz;

// Get the content from html file
file_put_contents('index.html', ob_get_contents());

$handler = new HandlerTarGz();
$handler->tararchive();
unlink('phpinfo.tar');
unlink('index.html');