<?php

class StatisticsMenu
{
    public static function show(): void
    {
        echo "\n=== Statistiques ===\n";
        echo "Âge moyen des patients : " . Patient::calculateAverageAge() . "\n";
        echo "Ancienneté moyenne des médecins : " . Doctor::calculateAverageYearsOfService() . "\n";
        print_r(Department::getMostPopulated());
    }
}