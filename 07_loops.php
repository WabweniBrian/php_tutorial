<?php

// while
$counter = 0;
// while ($counter <= 10) {
//     echo $counter . '<br>';
//     $counter++;
// }



// do - while
// do {
//     echo $counter . '<br>';
//     $counter++;
// } while ($counter <= 10);

// for
// for ($i = 0; $i < 10; $i++) {
//     echo $i . '<br>';
// }

$fruits = ["mangos", "oranges", "apples"];

// foreach
foreach ($fruits as $i => $fruits) {
    echo $i . $fruits . '<br />';
}

// Iterate Over associative array.
$person = [
    'name' => "Brian",
    'surname' => "wabweni",
    'age' => 25,
    'hobbies' => ['dancing', 'computer games', 'singing']
];
foreach ($person as $key => $value) {
    if (is_array($value)) {
        echo $key . ': ' . implode(",", $value) . '<br>';
    } else {
        echo $key . ': ' .  $value . '<br>';
    }
}