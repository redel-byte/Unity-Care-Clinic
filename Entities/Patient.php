<?php
require_once __DIR__ . "/Personne.php";
require_once __DIR__ . "/../Core/BaseModel.php";
require_once __DIR__ . "/../Core/Displayable.php";

class Patient extends Personne implements Displayable
{
    protected static string $table = "patients";

    public int $age;
    public string $registrationDate;
    public int $departmentId;

    public function save(): bool
    {
        $db = Database::connect();
        $stmt = $db->prepare(
            "INSERT INTO patients(first_name,last_name,email,phone,age,registration_date,department_id)
             VALUES (?,?,?,?,?,?,?)"
        );
        return $stmt->execute([
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phone,
            $this->age,
            $this->registrationDate,
            $this->departmentId,
        ]);
    }

    public function toArray(): array
    {
        return [
            $this->firstName,
            $this->lastName,
            $this->age,
            $this->departmentId
        ];
    }

    public static function getDisplayHeaders(): array
    {
        return ["First Name", "Last Name", "Age", "Dept"];
    }

    
    public static function calculateAverageAge(): float
    {
        $db = Database::connect();
        $r = $db->query("SELECT AVG(age) as avg FROM patients")->fetch();
        return round($r['avg'] ?? 0, 2);
    }

    public static function countByDepartment(): array
    {
        $db = Database::connect();
        $stmt = $db->query(
            "SELECT department_id, COUNT(*) total FROM patients GROUP BY department_id"
        );
        return $stmt->fetchAll();
    }
}