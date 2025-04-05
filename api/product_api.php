<?php
require_once '../controllers/ProductController.php';

// Note về việc gửi api request: Các class, method sẽ k tự nhận được request từ frontend mà sẽ cần 1 điểm entry point, ở đây là product_api
// entry point này k phải class mà sẽ là chỗ tiếp nhận đc dẫn, content của request và sẽ dùng class controller để gọi xuống lấy data

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data["query"])) {
        echo json_encode(["message" => "Thiếu dữ liệu"]);
        exit;
    }

    $query = trim($data["query"]);
    
    // Tạo một instance của ProductController
    $productController = new ProductController();
    $result = $productController->search($query);

    echo json_encode($result, JSON_PRETTY_PRINT); // Gửi kết quả dưới dạng json cho frontend
}
?>
