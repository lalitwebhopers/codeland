<?php

namespace Lalit\Codeland\Routes;

include "Route.php";
foreach (glob("src/Controllers/*.php") as $filename) include $filename;



use Lalit\Codeland\Controllers\HomeController;
use Lalit\Codeland\Controllers\UserController;

class Web
{
    public static $url;

    public static function getResponse($url)
    {
        self::$url = $url;

        if (self::route(''))
            return Route::get($url, HomeController::class, 'index');

        // if (preg_match('/(^\/users\/.*?\/edit$)/', $url))
        if (self::route('/users/{id}/edit'))
            return Route::get($url, UserController::class, 'edit');

        if (self::route('/users'))
            return Route::get($url, UserController::class, 'index');

        http_response_code(404);
        require dirname(__DIR__) . '/Views/errors/404.php';
    }

    public static function route($route)
    {
        // extract url without query params
        $main_url = explode('?', self::$url, 2)[0];

        // find url with variables
        if (str_contains($route, '/{')) {
            $route = str_replace('{', '@', $route);
            $route = str_replace('}', '@', $route);
            $route_array = explode('@', $route);
            if (count($route_array) % 2 == 0) return false;
            $regex_route = $route;
            for ($i = 1; ($i <= (count($route_array) - 1) / 2); $i++) {
                $regex_route = str_replace('@' . $route_array[$i * 2 - 1] . '@', '.*?', $regex_route);
            }

            $params = [];
            $regex_route = str_replace('/', '\/', $regex_route);
            if (preg_match('/(^' . $regex_route . '$)/', $main_url)) {
                $temp_route = $route;
                $temp_url = $main_url;
                while (strlen($temp_route)) {
                    $a = explode('@', $temp_route);
                    $temp_url = preg_replace('/' . preg_quote($a[0], '/') . '/', '', $temp_url, 1);
                    $b = explode('/', $temp_url, 2);
                    $a = explode('@', $a[1]);
                    $temp_route = $a[1];
                    $params[$a[0]] = $b[0];
                }
                // var_dump($params);
                return true;
            }
        }

        // exact match
        return $main_url == $route;
    }
}
