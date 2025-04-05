<?php
    include './resources/dbCreate.php';

    // Nếu không phải API, chuyển hướng đến trang chính
    if (!isset($requestUri) || strpos($requestUri, "/api") === false || strpos($requestUri, "/controllers/AdminController.php") === false) {
        header("Location: controllers/index.php");
        exit();
}
?>
