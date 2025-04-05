<?php
require_once '../models/ProductModel.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Khởi động session 1 lần duy nhất
}

// Note về việc gửi api request: Các class, method sẽ k tự nhận được request từ frontend mà sẽ cần 1 điểm entry point, ở đây là product_api
// entry point này k phải class mà sẽ là chỗ tiếp nhận đc dẫn, content của request và sẽ dùng class controller để gọi xuống lấy data

class ProductController {
    private $repository;
    private $limit;
    private $offset;
    private $sort;

    public function __construct($limit = 12, $offset = 0, $sort = "") {
        $this->repository = new ProductModel();
        $this->limit = $limit;
        $this->offset = $offset;
        $this->sort = $sort;
    }

    public function index($category) {
        $category = $category === "Food" ? "CAT001" : "CAT002";
        $this->setPagination();
        $order_by = $this->getSortOrder();
        $foods = $this->repository->getProducts($category, $this->limit, $this->offset, $order_by);
        $totalProducts = $this->repository->getNumProducts();
        $totalPage = ceil($totalProducts / $this->limit);
        $currentPage = floor($this->offset / $this->limit) + 1;
        if (empty($foods)){
            $totalPage = 1;
            $currentPage = 1; 
        }

        $this->loadView('food', [
            'foods' => $foods,
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
            'limit' => $this->limit,
            'offset' => $this->offset
        ]);
    }

    public function search($query) {
        return $this->repository->searchProducts($query);
    }

    private function setPagination() {
        $prev_limit = $_SESSION['prev_limit'] ?? 12;

        if ($prev_limit != $this->limit) {
            if ($this->limit == 24) { // 12 -> 24
                $oldCurrentPage = floor($this->offset / $prev_limit) + 1;
                $currentPage = ceil($oldCurrentPage / 2);
                $this->offset = ($currentPage - 1) * $this->limit;
            } else { // 24 -> 12
                $oldCurrentPage = floor($this->offset / $prev_limit) + 1;
                $currentPage = $oldCurrentPage * 2 - 1;
                $this->offset = ($currentPage - 1) * $this->limit;
            }
        }

        $_SESSION['prev_limit'] = $this->limit;
        $_SESSION['prev_offset'] = $this->offset;
    }

    private function getSortOrder() {
        $order_by = "";
        $_SESSION['prev_sort'] = $this->sort;
        switch ($this->sort) {
            case 'a-z':
                $order_by = "products.NAME ASC";
                break;
            case 'z-a':
                $order_by = "products.NAME DESC";
                break;
            case 'min':
                $order_by = "products.PRICE ASC";
                break;
            case 'max':
                $order_by = "products.PRICE DESC";
                break;
            case 'None':
                $order_by = "";
                unset($_SESSION['prev_sort']);
                break;
            default:
                $order_by = "";
        }

        return $order_by;
    }

    private function loadView($view, $data = []) {
        extract($data);
        include "../views/header.php";
        include "../views/{$view}.php";
        include "../views/footer.php";
    }
}
?>
