<?php

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$imagePath = null;

if (!$title) {
    array_push($errors, 'Product title is required');
}
if (!$price) {
    array_push($errors, 'Product price is required');
}

if (!is_dir('images')) {
    mkdir('images');
}



if (empty($errors)) {

    $image =  $_FILES['image']['name'] ?? null;
    $temp_name = $_FILES['image']['tmp_name'];
    $imagePath = $product['image'];

    if ($image) {

        if ($product['image']) {
            unlink($product['image']);
            rmdir(dirname($imagePath));
        }

        $imagePath = 'images/' . randomString(10) . '/' . $image;
        mkdir(dirname($imagePath));
        move_uploaded_file($temp_name, $imagePath);
    }
}