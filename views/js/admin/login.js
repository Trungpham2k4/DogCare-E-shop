document.getElementById('loginForm').addEventListener("submit", function(event){
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch("http://localhost/mywebsite/api/admin_auth.php", {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            type : "login",
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {  // Nếu có lỗi từ API
            const error = document.getElementById("emailPasswordError");
            error.innerHTML = "Email or password is incorrect";
        } else if (data.redirect) {  // Nếu xác thực thành công
            window.location.href = data.redirect;
        }
    })
    .catch(err => console.log(err))
    // .then(response => response.text())  // Đổi từ .json() -> .text() để kiểm tra nội dung
    // .then(data => {
    //     console.log("Server raw response:", data);
    //     return JSON.parse(data);  // Parse JSON sau khi kiểm tra nội dung
    // })
    // .catch(error => console.error("Error:", error));

})


