<?php

namespace app\models;

use app\core\Modal;

/**
 * Class User
 * @package app\models
 */
abstract class User extends Modal
{
    /**
     * Table name
     */
    private const TABLE = 'user';

    /**
     * @param string $login
     * @return mixed
     */
    public static function getByLogin(string $login)
    {
        return self::db()->selectRow(self::TABLE, [], ['login', $login]);
    }

    /**
     * @param string $id
     * @param string $permission
     * @return void
     */
    public static function login(string $id, string $permission): void
    {
        $_SESSION['user'] = $id;
        $_SESSION['user_permission'] = $permission;
    }

    /**
     * @return void
     */
    public static function logout(): void
    {
        unset($_SESSION['user']);
        unset($_SESSION['user_permission']);
    }

    /**
     * @return bool
     */
    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return bool
     */
    public static function isAdmin(): bool
    {
        return (self::isLogged() &&
            isset($_SESSION['user_permission']) &&
            $_SESSION['user_permission'] == 'admin');
    }
}
