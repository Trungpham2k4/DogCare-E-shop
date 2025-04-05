<?php 
    // 📌 Lý do: Nếu không gọi session_start(), thì session_unset() và session_destroy() sẽ không hoạt động.

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    setcookie("admin", "", time() - 3600, "/", "", true, true);
    session_unset();
    session_destroy();

    header("Location: ../controllers/admin.php?page=login");
    
    exit();
?>