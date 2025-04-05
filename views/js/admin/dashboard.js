function toggleDropdown() {
    document.getElementById("dropdown-menu").classList.toggle("show");
}

function logout() {
    alert("Logging out...");
    // Thực hiện hành động logout ở đây, ví dụ chuyển hướng:
    // window.location.href = "/logout";
}

// Đóng dropdown khi click bên ngoài
window.onclick = function(event) {
    if (!event.target.matches('.avatar')) {
        let dropdown = document.getElementById("dropdown-menu");
        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        }
    }
}
