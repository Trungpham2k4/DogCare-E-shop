<?php
require_once '../controllers/ProductManagmentController.php';
require_once '../models/UserModel.php';
$user = new UserModel();
// Điều hướng chính
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Khởi động session 1 lần duy nhất
}
$controller = isset($_GET['page']) ? $_GET['page'] : 'login';
if ($controller === 'login') {
    include '../views/admin/login.php';
    exit();
}
if ($controller === 'register') {
    include '../views/admin/register.php';
    exit();
}
if(isset($_COOKIE['admin'])){
    $result = $user->checkHaveLogin($_COOKIE['admin']);
    if ($result){
        $_SESSION['user_email'] = $result;
    }else{
        setcookie("admin", "", time() - 3600, "/");
        exit;
    }
}else{
    header("Location: admin.php?page=login");
    exit;
}

// Gọi controller tương ứng
switch ($controller) {
    case 'home':
        $controll = new ProductManagmentController();
        $listItem = $controll->read("CAT001");

        include '../views/admin/shared/header.php';
        include '../views/admin/dashboard.php';
        include '../views/admin/shared/footer.php';
        break;
    case 'item':
        $controll = new ProductManagmentController();
        $listItem = $controll->read("CAT002");

        include '../views/admin/shared/header.php';
        include '../views/admin/dashboard_item.php';
        include '../views/admin/shared/footer.php';
        break;

    case 'create':
        include '../views/admin/shared/header.php';
        include '../views/admin/add.php';
        include '../views/admin/shared/footer.php';
        break;
    case 'edit':
        $currentID = $_GET["productID"];

        include '../views/admin/shared/header.php';
        include '../views/admin/edit.php';
        include '../views/admin/shared/footer.php';
        break;
        
    default:
        include '../views/admin/login.php';
        break;
}
?>
