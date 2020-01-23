<?php

namespace app\components;

/**
 * Class Lib
 * @package app\components\lib
 */
abstract class Lib
{
    /**
     * @param string|null $url - Route
     * @return void
     */
    public static function redirect(string $url = null): void
    {
        $request = self::getRequestSchene();
        $host = $_SERVER['HTTP_HOST'];

        header("Location: $request://$host/$url");
        exit();
    }

    private static function getRequestSchene(): string
    {
        $reques_scheme = (isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http');

        return $reques_scheme;
    }
}
