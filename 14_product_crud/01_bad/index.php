<?php

function dd(array $arr): void
{
    echo '<pre>', print_r($arr), '</pre>';
}


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', ''); // connect to database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error mode


$search = $_GET["search"] ?? '';

if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC'); // prepare sql statement
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // prepare sql statement
}


$statement->execute(); // execute sql statement
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch all data from database




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
    <div class="container py-4">
        <h1>Products CRUD</h1>
        <p class="text-muted text-14">
            <a href="create.php" class="btn btn-sm btn-success">Create Product</a>
        </p>

        <form action="">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search products..."
                    value="<?= $search ?>">
                <button class=" btn btn-outline-secondary" type="submit">Search</button>
            </div>

        </form>

        <div class="p-2 shadow-sm rounded bg-white">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $i => $product) : ?>
                    <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td><img src="<?= $product['image'] ?>" alt="" class="avatar">
                        </td>
                        <td><?= $product['title'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['create_date'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $product['id'] ?>"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="delete.php" method="post" class="d-inline">
                                <input name="id" type="hidden" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>