<?php
// Magic constants
echo __DIR__ . '<br>';
echo __FILE__ . '<br>';
echo __LINE__ . '<br>';

// Create directory
// mkdir('test');

// Rename directory
// rename('test', 'test2');

// Delete directory
// rmdir('test2');

// Read files and folders inside directory
$files  = scandir('./');

echo '<pre>';
var_dump($files);
echo '<pre>';


// file_get_contents, file_put_contents
// echo file_get_contents('lorem.txt');
// file_put_contents('sample.txt', "Some content");

// file_get_contents from URL
// $usersJson = file_get_contents('https://jsonplaceholder.typicode.com/users');
// print_r(json_decode($usersJson, true));
// https://www.php.net/manual/en/book.filesystem.php
// file_exists
// is_dir
// filemtime
// filesize
// disk_free_space
// file