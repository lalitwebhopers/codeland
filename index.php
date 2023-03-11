<?php

use Lalit\Codeland\Routes\Web;

require __DIR__ . '/src/Routes/Web.php';

$url = $_SERVER['REQUEST_URI'];
if (substr($url, -1) == '/') $url = rtrim($url, "/");
return Web::getResponse($url);
