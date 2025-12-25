<?php

class MainMenu
{
    public static function show(): void
    {
        while (true) {
            echo "\n=== Unity Care CLI ===\n";
            echo "1. Gérer les patients\n";
            echo "2. Gérer les médecins\n";
            echo "3. Gérer les départements\n";
            echo "4. Statistiques\n";
            echo "5. Quitter\n";
            echo "Choix : ";

            $choice = trim(fgets(STDIN));

            switch ($choice) {
                case 1:
                    PatientMenu::show();
                    break;
                case 2:
                    DoctorMenu::show();
                    break;
                case 3:
                    DepartmentMenu::show();
                    break;
                case 4:
                    StatisticsMenu::show();
                    break;
                case 5:
                    sleep(1);
                    exit("Exit ...\n");
                default:
                    echo "Choix invalide\n";
            }
        }
    }
}