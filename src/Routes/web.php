<?php

namespace Lalit\Codeland\Routes;

foreach (glob("src/Controllers/*.php") as $filename) {
    include $filename;
}

use Lalit\Codeland\Controllers\HomeController;
use Lalit\Codeland\Controllers\UserController;

class Web
{
    public static function getResponse($url)
    {
        if ($url == '' || $url == '/') return HomeController::index();

        if ($url == '/users') return UserController::index();

        if (preg_match('/(^\/users\/.*?\/edit)/', $url)) return UserController::edit();

        http_response_code(404);
        require dirname(__DIR__) . '/Views/errors/404.php';
    }
}
