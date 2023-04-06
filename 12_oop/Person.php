<?php

class Person
{
    public string $name;
    public string $surname;
    private int $age;
    public static $counter = 0;

    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        self::$counter++;
    }


    public function setAge(int $age): void
    {
        $this->age = $age;
    }


    public function getAge(): int
    {
        return $this->age;
    }

    public static function getCounter(): int
    {
        return self::$counter;
    }
}