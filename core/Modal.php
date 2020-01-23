<?php

namespace app\core;

/**
 * Class Modal
 * @package app\core
 */
abstract class Modal
{
    /**
     * @var DB object
     */
    private static $db = null;

    /**
     * Get DB object
     * @return DB
     */
    public static function db()
    {
        if (!self::$db) {
            self::$db = new DB();
        }

        return self::$db;
    }
}
