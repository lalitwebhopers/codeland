<?php

namespace Lalit\Codeland\Routes;

class Route
{
    public static function get($url, $controller, $method)
    {
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return http_response_code(405);
        }

        return $controller::$method();
    }

    public static function post($url, $array)
    {
        // 
    }

    public static function put($url, $array)
    {
        // 
    }

    public static function delete($url, $array)
    {
        // 
    }
}
