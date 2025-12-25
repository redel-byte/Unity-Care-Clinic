<?php
require_once __DIR__ . "/../Entities/Patient.php";

class PatientMenu
{
    public static function show(): void
    {
        while (true) {
            echo "\n=== Gestion des Patients ===\n";
            echo "1. Lister tous les patients\n";
            echo "2. Rechercher un patient\n";
            echo "3. Ajouter un patient\n";
            echo "4. Modifier un patient\n";
            echo "5. Supprimer un patient\n";
            echo "6. Retour\n";
            echo "Choix : ";

            $choice = trim(fgets(STDIN));

            switch ($choice) {

                case 1:
                    $patients = Patient::getAll();
                    print_r($patients);
                    break;

                case 2:
                    echo "ID du patient : ";
                    $id = trim(fgets(STDIN));
                    $p = Patient::findById($id);
                    print_r($p ?? "Patient introuvable\n");
                    break;

                case 3:
                    echo "Prénom : "; $fn = trim(fgets(STDIN));
                    echo "Nom : ";    $ln = trim(fgets(STDIN));
                    echo "Email : ";  $em = trim(fgets(STDIN));
                    echo "Téléphone : "; $ph = trim(fgets(STDIN));
                    echo "Âge : ";    $age = trim(fgets(STDIN));
                    echo "Date inscription : "; $d = trim(fgets(STDIN));
                    echo "ID département : "; $dep = trim(fgets(STDIN));

                    $p = new Patient($fn,$ln,$em,$ph);
                    $p->age = $age;
                    $p->registrationDate = $d;
                    $p->departmentId = $dep;
                    $p->save();

                    echo "Patient ajouté\n";
                    break;

                case 4:
                    echo "ID du patient : ";
                    $id = trim(fgets(STDIN));
                    $p = Patient::findById((int)$id);
                    if (!$p) {
                        echo "Patient introuvable\n";
                        break;
                    }

                    echo "Prénom [{$p['first_name']}]: "; $fn = trim(fgets(STDIN)); if ($fn === '') $fn = $p['first_name'];
                    echo "Nom [{$p['last_name']}]: "; $ln = trim(fgets(STDIN)); if ($ln === '') $ln = $p['last_name'];
                    echo "Email [{$p['email']}]: "; $em = trim(fgets(STDIN)); if ($em === '') $em = $p['email'];
                    echo "Téléphone [{$p['phone']}]: "; $ph = trim(fgets(STDIN)); if ($ph === '') $ph = $p['phone'];
                    echo "Âge [{$p['age']}]: "; $age = trim(fgets(STDIN)); if ($age === '') $age = $p['age'];
                    echo "ID département [{$p['department_id']}]: "; $dep = trim(fgets(STDIN)); if ($dep === '') $dep = $p['department_id'];

                    $db = Database::connect();
                    $stmt = $db->prepare("UPDATE patients SET first_name=?, last_name=?, email=?, phone=?, age=?, department_id=? WHERE id=?");
                    $stmt->execute([$fn, $ln, $em, $ph, (int)$age, $dep === null ? null : (int)$dep, (int)$id]);

                    echo "Patient modifié \n";
                    break;

                case 5:
                    echo "ID du patient : ";
                    $id = trim(fgets(STDIN));

                    $db = Database::connect();
                    $stmt = $db->prepare("DELETE FROM patients WHERE id=?");
                    $stmt->execute([$id]);

                    echo "Patient supprimé \n";
                    break;

                case 6:
                    return;

                default:
                    echo "Choix invalide\n";
            }
        }
    }
}