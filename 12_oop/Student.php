<?php

require_once __DIR__ . './Person.php';

class Student extends Person
{
    public string $studentId;

    public function __construct(string $name, string $surname, int $age, string $studentId)
    {
        $this->studentId = $studentId;
        parent::__construct($name, $surname, $age);
    }
}