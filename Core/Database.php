<?php

class Database
{
    private static ?\PDO $conn = null;

    public static function connect(): \PDO
    {
        if (self::$conn === null) {
            $dsn = 'mysql:host=127.0.0.1;dbname=unity_care;charset=utf8mb4';
            try {
                self::$conn = new \PDO($dsn, 'root', '', [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (\PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$conn;
    }
}

