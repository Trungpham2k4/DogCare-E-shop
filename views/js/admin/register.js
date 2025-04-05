document.getElementById('loginReg').addEventListener("submit", function(event){
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log(email, password);

    fetch("http://localhost/mywebsite/api/admin_auth.php", {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            type : "register",
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.duplicate_email === "true"){
            document.getElementById('duplicateEmail').innerHTML = 'Email already exists'
        }else if (data.redirect) {  // Nếu xác thực thành công
            window.location.href = data.redirect;
        }
    })
    .catch(err => console.log(err))
    // .then(response => response.text())  // Đổi từ .json() -> .text() để kiểm tra nội dung
    // .then(data => {
    //     console.log("Server raw response:", data);
    //     // return JSON.parse(data);  // Parse JSON sau khi kiểm tra nội dung
    // })
    // .catch(error => console.error("Error:", error));

})