<?php 
    // 📌 Lý do: Nếu không gọi session_start(), thì session_unset() và session_destroy() sẽ không hoạt động.

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Đang có vấn đề nếu như 1 người logout thì tất cả logout do đang dùng chung cookie
    setcookie("user", "", time() - 3600, "/", "", true, true);
    session_unset();
    session_destroy();

    header("Location: ../controllers/index.php?page=home");
    
    exit();
?>