<?php

function dd(array $arr): void
{
    echo '<pre>', print_r($arr), '</pre>';
}

// Create array
$fruits = ["Mangos", "Oranges", "Apples"];

// Print the whole array
dd($fruits);


// Get element by index
echo $fruits[1] . '<br>';

// Set element by index
$fruits[0] = 'Peach';
dd($fruits);


// Check if array has element at index 2
isset($fruits[2]); //true

// Append element
$fruits[] = 'Bananas';
dd($fruits);


// Print the length of the array
echo count($fruits);

// Add element at the end of the array
array_push($fruits, 'Grapes');
dd($fruits);


// Remove element from the end of the array
echo array_pop($fruits);

// Add element at the beginning of the array
array_unshift($fruits, 'Dates');
dd($fruits);


// Remove element from the beginning of the array

echo array_shift($fruits);

// Split the string into an array
$string = "Banana, Apples, Peach";
dd(explode(",", $string));


// Combine array elements into string
echo '<pre>';
var_dump(implode("-", $fruits));
echo '<pre>';

// Check if element exist in the array
echo '<pre>';
var_dump(in_array('Apples', $fruits));
echo '<pre>';


// Search element index in the array
echo '<pre>';
var_dump(array_search('Apples', $fruits));
echo '<pre>';

// Merge two arrays
$vegetables = ["Cuccumber", "Sukuma",];


// var_dump(array_merge($fruits, $vegetables));
dd([...$fruits, ...$vegetables]);



// Sorting of array (Reverse order also)
rsort($fruits);
dd($fruits);



// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
$person = [
    'name' => "Brian",
    'surname' => "wabweni",
    'age' => 25,
    'hobbies' => ['dancing', 'computer games', 'singing']
];
dd($person);

// Get element by key
echo $person['name'];


// Set element by key
$person['channel'] = 'CodingGuru';
dd($person);


// Null coalescing assignment operator. Since PHP 7.4
// $person['address'] = $person['address'] ?? 'unknown';
$person['address'] ??= 'unknown';
dd($person);

// Check if array has specific key

// Print the keys of the array
dd(array_keys($person));

// Print the values of the array
dd(array_values($person));

// Sorting associative arrays by values, by keys
ksort($person);
dd($person);
asort($person);
dd($person);

// Two dimensional arrays

$todos = [
    [
        'title' => "Todo title 1",
        'completed' => true,
    ],
    [
        'title' => "Todo title 2",
        'completed' => false,
    ],
    [
        'title' => "Todo title 3",
        'completed' => true,
    ],
];

dd($todos);