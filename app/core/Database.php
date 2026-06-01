<?php

class Database
{
    public static function getConnection(): PDO
    {
        $charset = 'utf8mb4';
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_PORT,
            DB_NAME,
            $charset
        );

        return self::createPdo($dsn, DB_USER, DB_PASS);
    }

    /** Kết nối MySQL chưa chọn database (dùng khi tạo DB lần đầu). */
    public static function getServerConnection(): PDO
    {
        $charset = 'utf8mb4';
        $dsn = sprintf(
            'mysql:host=%s;port=%s;charset=%s',
            DB_HOST,
            DB_PORT,
            $charset
        );

        return self::createPdo($dsn, DB_USER, DB_PASS);
    }

    private static function createPdo(string $dsn, string $user, string $pass): PDO
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        return new PDO($dsn, $user, $pass, $options);
    }
}
