<?php
require_once '../controllers/ProductManagmentController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? null;
    $prod_name = trim($_POST["name"] ?? "") ?: null; // Loại bỏ khoảng trắng + kiểm tra rỗng
    $price = $_POST["price"] ?? null;
    $category = $_POST["category"] ?? null;
    $bio = trim($_POST["bio"] ?? "") ? : null; // Xóa khoảng trắng
    $image = $_POST["image"] ?? null;

    print_r($_POST);
    echo $price;
    echo $image;
        
    $controller = new ProductManagmentController();
    $controller->update($id, $prod_name, $price, $category, $image, $bio);

    header('Location: ../controllers/admin.php?page=home');
    exit();
}

?>