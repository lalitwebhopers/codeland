<?php

namespace Lalit\Codeland\Controllers;

class HomeController
{
    public static function index()
    {
        require dirname(__DIR__) . '/Views/homepage.php';
    }
}
