<?php

// Print current date
echo date('y-m-d H:i:s') . '<br/>';


// Print yesterday
echo date('y-m-d H:i:s', time() - 60 * 60 * 24) . '<br/>';

// Different format: https://www.php.net/manual/en/function.date.php
echo date('F j, Y') . '<br/>';

// Print current timestamp
echo time() . '<br/>';
// Parse date: https://www.php.net/manual/en/function.date-parse.php
$parsedDate = date_parse('2020-10-12 09:00:00');

var_dump($parsedDate);

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php