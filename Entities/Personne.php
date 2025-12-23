<?php
require_once __DIR__ . "/../Core/BaseModel.php";
require_once __DIR__ . "/../Core/Validator.php";

abstract class Personne extends BaseModel
{
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $phone;

    public function __construct($fn, $ln, $email, $phone)
    {
        $this->firstName = Validator::sanitize($fn);
        $this->lastName  = Validator::sanitize($ln);
        $this->email     = Validator::sanitize($email);
        $this->phone     = Validator::sanitize($phone);
    }

    public function getFullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }
}