<?php

class ConsoleTable
{
    public static function show(array $headers, array $rows): void
    {
        echo implode(" | ", $headers) . PHP_EOL;
        echo str_repeat("-", 60) . PHP_EOL;

        foreach ($rows as $row) {
            echo implode(" | ", $row) . PHP_EOL;
        }
    }
}
