<?php
require_once '../controllers/ProductManagmentController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // print_r($_POST);

    $prod_name = trim($_POST["name"]);
    $price = $_POST["price"];
    $category = $_POST["category"];
    $image = $_POST["image"];
    $bio = trim($_POST["bio"]);
        
    $controller = new ProductManagmentController();
    $controller->create($prod_name, $price, $category, $image, $bio);

    header('Location: ../controllers/admin.php?page=home');
    exit();
}

?>