<?php
class Validator
{
    private static $strRegex = "/^[a-zA-Z\s]+$/";
    private static $phoneRegex = "/^0[67][0-9]{8}$/";
    private static $emailRegex = "/^[a-zA-Z0-9_-%]+@(gmail|outlook)\\.com$/";
    private static $dateRegex = "/^\d{4}-\d{2}-\d{2}$/";

    public static function NotEmpty(string $input): bool
    {
        return !empty($input);
    }

    public static function isstring(string $input): bool
    {
        return preg_match(self::$strRegex, $input) ? true : false;
    }

    public static function isValidDate(string $input): bool
    {
        return preg_match(self::$dateRegex, $input) ? true : false;
    }

    public static function validateEmail(string $input): bool
    {
        return preg_match(self::$emailRegex, $input) ? true : false;
    }

    public static function validatePhone(string $input): bool
    {
        return preg_match(self::$phoneRegex, $input) ? true : false;
    }

    public static function rmSpecialChar(string $input): string
    {
        return htmlspecialchars(trim($input));
    }

    public static function sanitize(string $input): string
    {
        return self::rmSpecialChar($input);
    }
}