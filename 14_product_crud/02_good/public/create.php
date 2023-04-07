<?php

require_once __DIR__ . './../helper.php';
require_once __DIR__ . './../database.php';

$errors = [];

$title = $description = $price = "";
$product = [
    'image' => '',
];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    require_once __DIR__ . './../validate_product.php';


    if (empty($errors)) {
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


<?php include_once __DIR__ . './../views/partials/Header.php';  ?>

<div class="container pt-4">
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back to products</a>
    </p>

    <h1>Create new product</h1>

    <?php include_once __DIR__ . './../views/products/form.php'; ?>

</div>

<?php include_once __DIR__ . './../views/partials/Footer.php';  ?>