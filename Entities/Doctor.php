<?php
require_once __DIR__ . "/Personne.php";
require_once __DIR__ . "/../Core/BaseModel.php";

class Doctor extends Personne
{
    protected static string $table = "doctors";

    public int $yearsOfService;
    public int $departmentId;

    public function save(): bool
    {
        $db = Database::connect();
        $stmt = $db->prepare(
            "INSERT INTO doctors(first_name,last_name,email,phone,years_of_service,department_id)
             VALUES (?,?,?,?,?,?)"
        );
        return $stmt->execute([
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phone,
            $this->yearsOfService,
            $this->departmentId,
        ]);
    }

    public static function calculateAverageYearsOfService(): float
    {
        $db = Database::connect();
        $r = $db->query("SELECT AVG(years_of_service) avg FROM doctors")->fetch();
        return round($r['avg'] ?? 0, 2);
    }
}