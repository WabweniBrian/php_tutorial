<?php

// Create simple string
$name = "Brian";
$string = 'Hello $name';
$string2 = "Hello $name";

echo $string . '<br>';
echo $string2 . '<br>';

// String concatenation
$name = "Brian";
$string = 'Hello' . $name;

// String functions

$string = "  Hello World  ";

echo "1 - " . strlen($string) . '<br>';
echo "2 - " . trim($string) . '<br>';
echo "3 - " . ltrim($string) . '<br>';
echo "4 - " . rtrim($string) . '<br>';
echo "5 - " . str_word_count($string) . '<br>';
echo "6 - " . strrev($string) . '<br>';
echo "7 - " . strtoupper($string) . '<br>';
echo "8 - " . strtolower($string) . '<br>';
echo "9 - " . ucfirst('hello') . '<br>';
echo "10 - " . lcfirst('HELLO') . '<br>';
echo "11 - " . ucwords('hello world') . '<br>';
echo "12 - " . strpos($string, 'world') . '<br>';
echo "13 - " . stripos($string, 'world') . '<br>';
echo "14 - " . substr($string, 6) . '<br>';
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>';
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>';

// Multiline text and line breaks
$longText = "
Hello, my name is Brian
Iam 21 years
I love coding
";

echo $longText . '<br>';
echo nl2br($longText) . '<br>';

// Multiline text and reserve html tags

// https://www.php.net/manual/en/ref.strings.php