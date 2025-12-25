<?php
require_once __DIR__ . "/../Entities/Department.php";

class DepartmentMenu
{
    public static function show(): void
    {
        while (true) {
            echo "\n=== Gestion des Départements ===\n";
            echo "1. Lister tous les départements\n";
            echo "2. Rechercher un département\n";
            echo "3. Ajouter un département\n";
            echo "4. Modifier un département\n";
            echo "5. Supprimer un département\n";
            echo "6. Retour\n";
            echo "Choix : ";

            $c = trim(fgets(STDIN));

            switch ($c) {
                case 1:
                    print_r(Department::getAll());
                    break;

                case 2:
                    echo "ID : ";
                    print_r(Department::findById(trim(fgets(STDIN))));
                    break;

                case 3:
                    echo "Nom : ";
                    $d = new Department();
                    $d->name = trim(fgets(STDIN));
                    $d->save();
                    echo "Département ajouté \n";
                    break;

                case 4:
                    echo "ID : ";
                    $id = trim(fgets(STDIN));
                    echo "Nouveau nom : ";
                    $name = trim(fgets(STDIN));

                    $db = Database::connect();
                    $stmt = $db->prepare("UPDATE departments SET name=? WHERE id=?");
                    $stmt->execute([$name, $id]);
                    echo "Département modifié \n";
                    break;

                case 5:
                    echo "ID : ";
                    $id = trim(fgets(STDIN));
                    $db = Database::connect();
                    $stmt = $db->prepare("DELETE FROM departments WHERE id=?");
                    $stmt->execute([$id]);
                    echo "Département supprimé \n";
                    break;

                case 6:
                    return;
            }
        }
    }
}