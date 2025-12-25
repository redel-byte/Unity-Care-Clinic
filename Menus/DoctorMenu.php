<?php
require_once __DIR__ . "/../Entities/Doctor.php";

class DoctorMenu
{
    public static function show(): void
    {
        while (true) {
            echo "\n=== Gestion des Médecins ===\n";
            echo "1. Lister tous les médecins\n";
            echo "2. Rechercher un médecin\n";
            echo "3. Ajouter un médecin\n";
            echo "4. Modifier un médecin\n";
            echo "5. Supprimer un médecin\n";
            echo "6. Retour\n";
            echo "Choix : ";

            $c = trim(fgets(STDIN));

            switch ($c) {
                case 1:
                    print_r(Doctor::getAll());
                    break;

                case 2:
                    echo "ID : ";
                    print_r(Doctor::findById(trim(fgets(STDIN))));
                    break;

                case 3:
                    echo "Prénom : "; $fn = trim(fgets(STDIN));
                    echo "Nom : ";    $ln = trim(fgets(STDIN));
                    echo "Email : ";  $em = trim(fgets(STDIN));
                    echo "Téléphone : "; $ph = trim(fgets(STDIN));
                    echo "Années service : "; $y = trim(fgets(STDIN));
                    echo "ID département : "; $dep = trim(fgets(STDIN));

                    $d = new Doctor($fn,$ln,$em,$ph);
                    $d->yearsOfService = $y;
                    $d->departmentId = $dep;
                    $d->save();
                    echo "Médecin ajouté\n";
                    break;

                case 4:
                    echo "ID : ";
                    $id = trim(fgets(STDIN));
                    $d = Doctor::findById((int)$id);
                    if (!$d) {
                        echo "Médecin introuvable\n";
                        break;
                    }

                    echo "Prénom [{$d['first_name']}]: "; $fn = trim(fgets(STDIN)); if ($fn === '') $fn = $d['first_name'];
                    echo "Nom [{$d['last_name']}]: "; $ln = trim(fgets(STDIN)); if ($ln === '') $ln = $d['last_name'];
                    echo "Email [{$d['email']}]: "; $em = trim(fgets(STDIN)); if ($em === '') $em = $d['email'];
                    echo "Téléphone [{$d['phone']}]: "; $ph = trim(fgets(STDIN)); if ($ph === '') $ph = $d['phone'];
                    echo "Années service [{$d['years_of_service']}]: "; $y = trim(fgets(STDIN)); if ($y === '') $y = $d['years_of_service'];
                    echo "ID département [{$d['department_id']}]: "; $dep = trim(fgets(STDIN)); if ($dep === '') $dep = $d['department_id'];

                    $db = Database::connect();
                    $stmt = $db->prepare("UPDATE doctors SET first_name=?, last_name=?, email=?, phone=?, years_of_service=?, department_id=? WHERE id=?");
                    $stmt->execute([$fn, $ln, $em, $ph, (int)$y, $dep === null ? null : (int)$dep, (int)$id]);
                    echo "Médecin modifié \n";
                    break;

                case 5:
                    echo "ID : ";
                    $id = trim(fgets(STDIN));
                    $db = Database::connect();
                    $stmt = $db->prepare("DELETE FROM doctors WHERE id=?");
                    $stmt->execute([$id]);
                    echo "Médecin supprimé \n";
                    break;

                case 6:
                    return;
            }
        }
    }
}
