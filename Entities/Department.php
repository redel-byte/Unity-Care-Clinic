<?php
require_once __DIR__ . "/../Core/BaseModel.php";

class Department extends BaseModel
{
    protected static string $table = "departments";
    public string $name;

    public function save(): bool
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO departments(name) VALUES (?)");
        return $stmt->execute([$this->name]);
    }

    public static function getMostPopulated(): array
    {
        $db = Database::connect();
        $stmt = $db->query(
            "SELECT department_id, COUNT(*) total 
             FROM patients GROUP BY department_id 
             ORDER BY total DESC LIMIT 1"
        );
        return $stmt->fetch() ?: [];
    }
}