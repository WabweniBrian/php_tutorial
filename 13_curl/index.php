<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.
// $resource =  curl_init($url);
// curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($resource);
// $code = curl_getinfo($resource, CURLINFO_HTTP_CODE);

// echo '<pre>';
// var_dump($code);
// echo '<pre>';
// curl_close($resource);

// echo $response;



// Get response status code

// set_opt_array

// Post request
$user = [
    'name' => 'John Doe',
    'username' => 'John',
    'email' => 'johndoe@example.com',
];

$resource =  curl_init();
curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($user),
]);

$response = curl_exec($resource);
curl_close($resource);
echo  $response;