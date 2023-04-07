<?php

require_once __DIR__ . './../helper.php';
require_once __DIR__ . './../database.php';

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

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    require_once __DIR__ . './../validate_product.php';

    if (empty($errors)) {
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

<?php include_once __DIR__ . './../views/partials/Header.php';  ?>


<div class="container pt-4">
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back to products</a>
    </p>
    <h1>Edit Product</h1>
    <?php include_once __DIR__ . './../views/products/form.php'; ?>

</div>


<?php include_once __DIR__ . './../views/partials/Footer.php';  ?>