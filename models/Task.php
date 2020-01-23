<?php


namespace app\models;

use app\core\Modal;

/**
 * Class Task
 * @package app\models
 */
abstract class Task extends Modal
{
    /**
     * Table name
     */
    private const TABLE = 'task';
    public const NAME_MAX = 40;

    /**
     * @param string $name
     * @param string $email
     * @param string $text
     */
    public static function add(string $name, string $email, string $text): void
    {
        self::db()->insert(self::TABLE, ['name', $name, 'email', $email, 'text', $text]);
    }

    /**
     * @param int $start_from
     * @param int $size
     * @param string $order_by
     * @param bool $sort
     * @return array|null
     */
    public static function get(int $start_from = 0, int $size = 3, string $order_by = 'id', $sort = true): ?array
    {
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . $order_by . ' ' .
                ($sort ? 'DESC' : '') . ' LIMIT ' . $size . ' OFFSET ' . $start_from;

        return self::db()->rows($sql);
    }

    /**
     * @return int
     */
    public static function count(): int
    {
        $sql = 'SELECT COUNT(*) FROM ' . self::TABLE;

        $result = self::db()->execute($sql);
        return $result->fetchColumn();
    }

    /**
     * @param int $id
     * @param int $status
     */
    public static function changeStatus(int $id, int $status): void
    {
        self::db()->update(self::TABLE, ['status', $status], ['id', $id], 1);
    }

    /**
     * @param int $id
     * @param string $text
     */
    public static function changeText(int $id, string $text): void
    {
        self::db()->update(self::TABLE, ['text', $text], ['id', $id], 1);
    }

    /**
     * @param int $id
     */
    public static function setEditedByAdmin(int $id): void
    {
        self::db()->update(self::TABLE, ['edited_by_admin', 1], ['id', $id], 1);
    }
}
