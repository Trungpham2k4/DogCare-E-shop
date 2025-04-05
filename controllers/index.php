<?php
// Điều hướng chính
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Khởi động session 1 lần duy nhất
}
$controller = isset($_GET['page']) ? $_GET['page'] : 'home';

// Gọi controller tương ứng
switch ($controller) {
    case 'login':
        loadView($controller);
        break;
    case 'food':
        require_once '../controllers/ProductController.php';


        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : ($_SESSION['prev_limit' ] ?? 12);
        $offset = isset($_GET['offset']) ? max(0, (int)$_GET['offset']) : ($_SESSION['prev_offset'] ?? 0);

        $valid_sorts = ['a-z', 'z-a', 'min', 'max', 'None'];
        $sort = isset($_GET['sort']) && in_array($_GET['sort'], $valid_sorts) ? $_GET['sort'] : ($_SESSION['prev_sort'] ?? "");
        // echo $_SESSION['prev_sort'];
        // echo $sort;
        $category = "Food";
        
        $productController = new ProductController($limit, $offset, $sort);
        $productController->index($category); // Hàm này có thể load view phù hợp
        break;

    case 'item':
    case 'about':
    case 'service':
    case 'contact':
        require_once '../models/UserModel.php';
        $user = new UserModel();
        if(isset($_COOKIE['user'])){
            $result = $user->checkHaveLogin($_COOKIE['user']);
            if ($result){
                $_SESSION['user_email'] = $result;
            }else{
                setcookie("user", "", time() - 3600, "/");
            }
        }else{
            header("Location: index.php?page=login");
            exit;
        }
    case 'home':
        loadView($controller);
        break;

    default:
        loadView('home');
        break;
}

function loadView($view) {
    include "../views/{$view}.php";
}
?>
