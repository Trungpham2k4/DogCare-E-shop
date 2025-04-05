<?php
require_once '../controllers/ProductManagmentController.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $prod_id = $_GET["productID"];
        
    $controller = new ProductManagmentController();
    $controller->delete($prod_id);

    header('Location: ../controllers/admin.php?page=home');
    exit();
}

?>