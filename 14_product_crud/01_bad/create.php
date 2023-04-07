<?php

require_once __DIR__ . './helper.php';


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // connect to database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error mode

$errors = [];

$title = $description = $price = "";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image =  $_FILES['image']['name'] ?? null;
    $temp_name = $_FILES['image']['tmp_name'];



    if (!$title) {
        array_push($errors, 'Product title is required');
    }
    if (!$price) {
        array_push($errors, 'Product price is required');
    }

    if (!is_dir('images')) {
        mkdir('images');
    }

    // $imagePath = '';

    if (empty($errors)) {
        if ($image) {

            $imagePath = 'images/' . randomString(10) . '/' . $image;
            mkdir(dirname($imagePath));
            move_uploaded_file($temp_name, $imagePath);
        }

        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location: index.php');
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products crud</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div class="container pt-4">
        <h1>Create new product</h1>
        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $i => $error) : ?>

            <div><?= $error ?></div>


            <?php endforeach; ?>
        </div>
        <?php endif ?>
        <div class="p-2 shadow-sm rounded bg-white">
            <form action="create.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title.." value="<?= $title ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Description</label>
                    <textarea name="description" class="form-control"
                        placeholder="Description.."><?= $description ?></textarea>
                </div>
                <div class=" mb-3">
                    <label class="form-label">Product price</label>
                    <input type="number" name="price" class="form-control" step=".01" placeholder="Price.."
                        value="<?= $price ?>">
                </div>


                <button type=" submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>