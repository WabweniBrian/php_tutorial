<?php

require_once __DIR__ . './Person.php';
require_once __DIR__ . './Student.php';

// What is class and instance
// $person = new Person('John', 'Smith', 10);

// echo '<pre>';
// var_dump($person);
// echo '<pre>';

// $person->setAge(30);
// echo $person->getAge() . '<br>';

// echo Person::$counter . '<br>';
// echo Person::getCounter() . '<br>';

$student = new Student("Brian", "Wabweni", 20, 'AB8989');

echo '<pre>';
var_dump($student);
echo '<pre>';

echo Student::getCounter();

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter