<?php

namespace app\controllers;

use app\models\Product;
use app\Router;

class ProductController
{

    /** Show the product list */
    public function index(Router $router)
    {
        $search = $_GET["search"] ?? '';
        $products = $router->db->all($search);
        return $router->view('products/index', ['products' => $products, 'search' => $search]);
    }


    /**Show & Save products to the database */
    public function save(Router $router)
    {
        $errors = [];
        $productData = ['title' => '', 'description' => '', 'price' => '', 'image' => ''];


        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $productData['title'] = $_POST['title'];
            $productData['description'] = $_POST['description'];
            $productData['price'] = $_POST['price'];
            $productData['imageFile'] = $_FILES['image'] ?? null;

            $product = new Product();
            $product->processData($productData);
            $errors = $product->validate();

            if (empty($errors)) {
                $product->save();
                header('Location:  / ');
                exit;
            }
        }

        return $router->view('products/create', ['doc_title' => 'New Product', 'product' => $productData, 'errors' => $errors]);
    }


    /**Show &  Update a product */
    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;
        $errors = [];
        $productData = $router->db->find($id);


        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $productData['title'] = $_POST['title'];
            $productData['description'] = $_POST['description'];
            $productData['price'] = $_POST['price'];
            $productData['imageFile'] = $_FILES['image'] ?? null;

            $product = new Product();
            $product->processData($productData);
            $errors = $product->validate();

            if (empty($errors)) {
                $product->save();
                header('Location:  / ');
                exit;
            }
        }

        return $router->view('products/update', ['doc_title' => 'Update Product', 'product' => $productData, 'errors' => $errors]);
    }

    /** Delete a product */
    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;
        $router->db->destory($id);
        header('Location:  / ');
    }
}