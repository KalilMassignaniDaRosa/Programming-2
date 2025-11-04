<?php
class Connection
{
    private static $pdo = null;

    public static function connect()
    {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=school;charset=utf8mb4',
                    'root',
                    'root'
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            } catch (PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage());
                throw new Exception("Could not connect to database. Please check your credentials.");
            }
        }
        return self::$pdo;
    }
}
