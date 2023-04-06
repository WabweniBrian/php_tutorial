<?php

$age = 20;
$salary = 300000;

// Sample if
if ($age === 20) {
    echo "1" . '<br>';
}

// Without circle braces
if ($age === 20) echo "1" . '<br>';


// Sample if-else
if ($age > 20) {
    echo '1' . '<br>';
} else {
    echo '2' . '<br>';
}

// Difference between == and ===
if ($age == 20) {
    echo "1" . '<br>';
}

if ($age === '20') {
    echo "2" . '<br>';
}


$age == 20; //true
$age == "20"; //true

$age === 20; //true
$age === "20"; //false



// if AND
if ($age > 20 && $salary === 300000) {
    echo "Do something";
}

// if OR
if (
    $age > 20 || $salary === 300000
) {
    echo "Do something" . '<br>';
}

// Ternary if
echo $age < 22 ? "Young" : "Old";
echo '<br>';

// Short ternary
$myAge =  $age ?: 18;

var_dump($myAge);

// Null coalescing operator
isset($name) ?? 'Brian';

// switch

$userRole = 'admin';

switch ($userRole) {
    case 'admin':
        echo "Admin";
        break;
    case 'editor':
        echo "Editor";
        break;
    case 'user':
        echo "User";
        break;
    default:
        "Invalid role";
};