<?php
require_once __DIR__ . "/Database.php";

abstract class BaseModel
{
    protected ?int $id = null;
    protected static string $table;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function delete(): bool
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    public static function findById(int $id): ?array
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function getAll(): array
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll();
    }
}
