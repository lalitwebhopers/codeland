<?php

namespace Lalit\Codeland\Controllers;

class UserController
{
    public static function index()
    {
        require dirname(__DIR__) . '/Views/users/index.php';
    }

    public static function edit()
    {
        require dirname(__DIR__) . '/Views/users/edit.php';
    }
}
