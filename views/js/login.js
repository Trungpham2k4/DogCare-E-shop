/*=============== SHOW HIDE PASSWORD LOGIN ===============*/
const passwordAccess = (loginPass, loginEye) =>{
    const input = document.getElementById(loginPass),
          iconEye = document.getElementById(loginEye)
 
    iconEye.addEventListener('click', () =>{
       // Change password to text
       input.type === 'password' ? input.type = 'text'
                                       : input.type = 'password'
 
       // Icon change
       iconEye.classList.toggle('ri-eye-fill')
       iconEye.classList.toggle('ri-eye-off-fill')
    })
 }
 passwordAccess('password','loginPassword')
 
 /*=============== SHOW HIDE PASSWORD CREATE ACCOUNT ===============*/
 const passwordRegister = (loginPass, loginEye) =>{
    const input = document.getElementById(loginPass),
          iconEye = document.getElementById(loginEye)
 
    iconEye.addEventListener('click', () =>{
       // Change password to text
       input.type === 'password' ? input.type = 'text'
                                       : input.type = 'password'
 
       // Icon change
       iconEye.classList.toggle('ri-eye-fill')
       iconEye.classList.toggle('ri-eye-off-fill')
    })
 }
 passwordRegister('passwordCreate','loginPasswordCreate')
 
 /*=============== SHOW HIDE LOGIN & CREATE ACCOUNT ===============*/
 const loginAcessRegister = document.getElementById('loginAccessRegister'),
       buttonRegister = document.getElementById('loginButtonRegister'),
       buttonAccess = document.getElementById('loginButtonAccess')
 
 buttonRegister.addEventListener('click', () => {
    loginAcessRegister.classList.add('active')
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    document.getElementById('emailPasswordError').innerHTML = '';
 })
 
 buttonAccess.addEventListener('click', () => {
    loginAcessRegister.classList.remove('active')
    document.getElementById('emailCreate').value = ''
    document.getElementById('passwordCreate').value = ''
    document.getElementById('names').value = ''
    document.getElementById('surnames').value = ''
    document.getElementById('invalidPassword').innerHTML = '';
    document.getElementById('duplicateEmail').innerHTML = '';
 })
 


document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn form reload mặc định
    // const error = document.getElementById("emailPasswordError");
    // error.innerHTML = "Email or password is incorrect"
    // return

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;


    // Note về chuyện chuyển hướng, khi status code là 302 (Redirect) thì nếu dùng fetch sẽ cần phải điều hướng 
    // Lý do trang không chuyển hướng sau khi đăng nhập:
    // header("Location: ...") trong PHP chỉ có tác dụng trên trình duyệt, 
    // nhưng vì bạn gửi request bằng fetch(), trình duyệt không tự động chuyển hướng.
    fetch("http://localhost/mywebsite/api/authentication_register_api.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            type : "login",
            email: email,
            password: password
        })
    })
    .then(response => response.json()) // Chuyển response thành JSON
    .then(data => {
        console.log(data);
        if (data.error) {  // Nếu có lỗi từ API
            const error = document.getElementById("emailPasswordError");
            error.innerHTML = "Email or password is incorrect";
        } else if (data.redirect) {  // Nếu xác thực thành công
            window.location.href = data.redirect;
        }
    })
    .catch(error => {
        console.log("Error: " + error)
    })

})

document.getElementById('registerForm').addEventListener("submit", function(event) {
    event.preventDefault();
    const email =  document.getElementById('emailCreate').value
    const password = document.getElementById('passwordCreate').value
    const name = document.getElementById('names').value
    const surname= document.getElementById('surnames').value

    if (!isValidPassword(password)){
        const error = document.getElementById('invalidPassword'); // Note: nãy có thử trùng id thì nếu dùng id ở 2 chỗ khác nhau trong 2 file html thì nó sẽ bắt cái đầu
        error.innerHTML = 
        `Password must be at least 8 characters <br/>
        Password must have at least one lowercase character <br/>
        Password must have at least one uppercase character <br/>
        Password must have at least one special character`
        return
    }else{
        document.getElementById('invalidPassword').innerHTML = '';
    }

    fetch("http://localhost/mywebsite/api/authentication_register_api.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            type : "register",
            email: email,
            password: password,
            name: name,
            surname: surname
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.duplicate_email === "true"){
            document.getElementById('duplicateEmail').innerHTML = 'Email already exists'
        }else if (data.redirect) {  // Nếu xác thực thành công
            window.location.href = data.redirect;
        }
        // Còn lỗi trùng email chưa xử lý
    })
    .catch(error => {
        console.log("Error: " + error)
    })
    // .then(response => response.text())  // Đổi từ .json() -> .text() để kiểm tra nội dung
    // .then(data => {
    //     console.log("Server raw response:", data);
    //     return JSON.parse(data);  // Parse JSON sau khi kiểm tra nội dung
    // })
    // .catch(error => console.error("Error:", error));
})

function isValidPassword(password) {
    // Kiểm tra mật khẩu có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordRegex.test(password);
}
