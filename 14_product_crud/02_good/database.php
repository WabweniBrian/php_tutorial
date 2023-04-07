<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // connect to database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error mode