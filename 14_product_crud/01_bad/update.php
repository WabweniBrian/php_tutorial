<?php

require_once __DIR__ . './helper.php';

function dd(array $arr): void
{
    echo '<pre>', print_r($arr), '</pre>';
}


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // connect to database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error mode


$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH_ASSOC);

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];


// Submit product
$errors = [];

if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

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

        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);
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
        <p>
            <a href="index.php" class="btn btn-secondary">Go Back to products</a>
        </p>
        <h1>Edit Product</h1>

        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $i => $error) : ?>

            <div><?= $error ?></div>


            <?php endforeach; ?>
        </div>
        <?php endif ?>

        <div class="p-2 shadow-sm rounded bg-white">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    <?php if ($product['image']) : ?>
                    <img src="<?= $product['image'] ?>" alt="" class="mt-2">
                    <?php endif; ?>
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
                <button type=" submit" name="update" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</body>

</html>