<?php
require_once '../controllers/LoginRegisterController.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Khởi động session 1 lần duy nhất
}
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data["type"])) {
        echo json_encode(["message" => "Thiếu dữ liệu"]);
        exit;
    }else{
        $apiType = trim($data["type"]);
        if ($apiType == "login"){
            if (!isset($data["email"]) || !isset($data["password"])) {
                echo json_encode(["message" => "Thiếu dữ liệu"]);
                exit;
            }else{
                $email = trim($data["email"]);
                $password = trim($data["password"]);
                $auth_token = bin2hex(random_bytes(32));

                $userController = new LoginRegister($email, $password, $auth_token, "user");
                $result = $userController->authenticateUser();
                if ($result){
                    // Nãy chưa bật session nên k lưu được
                    $_SESSION["user_email"] = $email;
                    setcookie("user", $auth_token , time() + 3600, "/" );
                    echo json_encode(["redirect" => "../controllers/index.php"]); // Set redirect => "" thì sẽ có thể truy cập bên js với data.redirect
                }else{
                    echo json_encode(["error" => "Authentication failed"]);
                }
            }
        }else{
            if (!isset($data["email"]) || !isset($data["password"]) || !isset($data["surname"]) || !isset($data["name"])) {
                echo json_encode(["message" => "Thiếu dữ liệu"]);
                exit;
            }else{
                $email = trim($data["email"]);
                $password = trim($data["password"]);
                $surname = trim($data["surname"]);
                $name = trim($data["name"]);
                $auth_token = bin2hex(random_bytes(32));

                $userController = new LoginRegister($email, $password, $auth_token, "user", $surname, $name);
                if($userController->checkDuplicateEmail()){
                    echo json_encode(["duplicate_email" => "true"]);
                    exit;
                }
                if($userController->createUser()){
                    setcookie("user", $auth_token , time() + 3600, "/" );
                    $_SESSION["user_email"] = $email;
                    echo json_encode(["redirect" => "../controllers/index.php"]);
                    exit;
                }
            }
        }
    }
}
?>