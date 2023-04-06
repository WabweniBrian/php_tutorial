<?php

// Function which prints "Hello I am Zura"
// function hello(): void
// {
//     echo "Hello I am Brian";
// }

// hello();

// Function with argument
function hello(string $name): void
{
    echo "Hello I am $name" . '<br>';
}

hello("Brian");
hello("Raven");

// Create sum of two functions
// function add(int $a, int $b): int
// {
//     return $a + $b;
// }

// echo add(4, 5);

// Create function to sum all numbers using ...$nums
// function add(...$numbers): int
// {
//     $total = 0;
//     for ($i = 0; $i < count($numbers); $i++) {
//         $total += $numbers[$i];
//     };
//     return $total;
// }

// echo add(4, 5, 6, 5);

// Arrow functions
function add(...$numbers): int
{
    return array_reduce($numbers, fn ($carry, $num) => $carry + $num);
}

echo add(4, 5, 6, 5);