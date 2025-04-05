<?php
    require_once '../DTO/ProductDTO.php';

    class ProductModel{
        private $conn;

        public function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dogcare";
            
            // Create connection
            $this->conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($this->conn->connect_error) {
                $this->conn->close();
            die("Connection failed: " . $this->conn->connect_error);
            }
        }
        public function getNumProducts(){
            $numRows = $this->conn->query("SELECT COUNT(*) as num_row FROM products"); // Count number of products
            $totalProducts = 0;
            if($numRows){
                $temp = $numRows->fetch_assoc();
                $totalProducts = (int) $temp["num_row"];
            }
            return $totalProducts;
        }

        public function getProducts($category, $limit, $offset, $order_by){
            $sql = '';
            if ($order_by === ""){
                $sql = "SELECT * FROM products WHERE CATEGORY_ID = ? LIMIT ? OFFSET ? ;";
            }else{
                $sql = 'SELECT * FROM products WHERE CATEGORY_ID = ? ORDER BY ' . $order_by . ' LIMIT ? OFFSET ? ';
            }
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sii", $category, $limit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();


            $foods = []; // Dùng count($foods) dể lấy độ dài array
            
            if ($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $foods[] = new ProductDTO($row["ID"], $row["NAME"], $row["DESCRIPTION"], $row["CATEGORY_ID"], $row["PRICE"], $row["IMAGE"]);
                }
            }else {
                $foods = [];
            }
            return $foods;
        }

        public function getProductById($id){
            $sql = "SELECT * FROM products WHERE ID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows > 0){
                $row = $result->fetch_assoc();
                return new ProductDTO($row["ID"], $row["NAME"], $row["DESCRIPTION"], $row["CATEGORY_ID"], $row["PRICE"], $row["IMAGE"]);
                
            }
            return null;
        }

        public function getAll($category){
            $sql = "SELECT * FROM products WHERE CATEGORY_ID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$category);
            $stmt->execute();
            $result = $stmt->get_result();


            $foods = []; // Dùng count($foods) dể lấy độ dài array
            
            if ($result && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $foods[] = new ProductDTO($row["ID"], $row["NAME"], $row["DESCRIPTION"], $row["CATEGORY_ID"], $row["PRICE"], $row["IMAGE"]);
                }
            }else {
                $foods = [];
            }
            return $foods;
        }

        public function searchProducts($condition) {
            $sql = "SELECT * FROM products WHERE NAME LIKE ?";
            
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                die("SQL Error: " . $this->conn->error);
            }
        
            $search = "%" . $condition . "%"; // Thêm % để tìm kiếm gần đúng
            $stmt->bind_param("s", $search);
            $stmt->execute();
            $result = $stmt->get_result();
        
            $foods = [];
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $foods[] = new ProductDTO(
                        $row["ID"], 
                        $row["NAME"], 
                        $row["DESCRIPTION"], 
                        $row["CATEGORY_ID"], 
                        $row["PRICE"], 
                        $row["IMAGE"]
                    );
                }
            }
            
            return $foods; // Đảm bảo luôn trả về mảng
        }
        
        public function addProduct($id,$prod_name ,$price,$category, $image, $bio){
            $sql = "INSERT INTO products (ID, NAME, DESCRIPTION, PRICE, CATEGORY_ID, IMAGE) VALUES (?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssdss", $id, $prod_name,$bio, $price, $category, $image);
            if (!$stmt->execute()) {
                die("Lỗi khi INSERT: " . $stmt->error);
            }
            $stmt->close();
        }

        public function updateProduct($id,$prod_name ,$price,$category, $image, $bio){
            $sql = "UPDATE products SET NAME = ? , DESCRIPTION = ? , PRICE = ? , CATEGORY_ID = ? , IMAGE = ? WHERE ID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssdsss", $prod_name,$bio, $price, $category, $image,  $id);
            if (!$stmt->execute()) {
                die("Lỗi khi UPDATE: " . $stmt->error);
            }
        }

        public function deleteProduct($id){
            $sql = "DELETE FROM products WHERE ID = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$id);
            if (!$stmt->execute()) {
                die("Lỗi khi DELETE: " . $stmt->error);
            }
        }
    }
?>