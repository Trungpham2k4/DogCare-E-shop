<?php
    class UserModel{
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
        
        public function createUser($email, $password, $authtoken, $role, $surname, $name){
            try {
                $sql = "INSERT INTO USER (EMAIL, PASSWORD, ROLE, AUTH_TOKEN, SURNAME, NAME) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);

                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                
                if (!$stmt) {
                    throw new Exception("SQL Prepare failed: " . $this->conn->error);
                }
            
                $stmt->bind_param("ssssss", $email, $hashed_password, $role, $authtoken, $surname, $name);
                
                if (!$stmt->execute()) {
                    throw new Exception("SQL Execution failed: " . $stmt->error);
                }
            
                return true;
            } catch (Exception $e) {
                error_log($e->getMessage()); // Ghi log lỗi
                echo "Error: " . $e->getMessage();
            }
            
        }

        public function authenticate($email, $password, $token, $role){
            try {
                $updateTokenSql = "UPDATE USER SET AUTH_TOKEN = ? WHERE EMAIL = ?";
                $prep = $this->conn->prepare($updateTokenSql);
                $prep->bind_param("ss", $token, $email);
                $prep->execute();



                $sql = "SELECT * FROM USER WHERE ROLE = ? AND EMAIL = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ss", $role, $email);
                $stmt->execute();
                $result = $stmt->get_result();

                // Kiểm tra nếu truy vấn có trả về kết quả hay không
                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();  // Lấy dữ liệu từ database

                    // Kiểm tra xem key "PASSWORD" có tồn tại trong $user không
                    if (!isset($user["PASSWORD"])) {
                        die("Error: Cannot find PASSWORD column in table");
                    }

                    // Kiểm tra mật khẩu
                    if (password_verify($password, $user["PASSWORD"])) {
                        return true;
                    }
                }
                return false; // Sai tài khoản hoặc mật khẩu
            } catch (Exception $e) {
                error_log($e->getMessage()); // Ghi log lỗi
                echo "Error: " . $e->getMessage();
            }
        }

        public function checkDuplicateEmail($email){
            $sql = "SELECT COUNT(*) AS duplicate_users FROM USER WHERE EMAIL = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$email);
            $stmt->execute();

            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $final_res = $result->fetch_assoc();
                if ($final_res["duplicate_users"] == 0){
                    return false;
                }else{
                    return true;
                }
            }
        }

        public function checkHaveLogin($token){
            $sql = "SELECT EMAIL FROM USER WHERE AUTH_TOKEN = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();

            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $final_res = $result->fetch_assoc();
                return $final_res["EMAIL"];
            }else{
                return false;
            }
        }
    }
?>