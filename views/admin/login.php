<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../views/css/admin/login.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
    </head>
    
    <body>
        <main>
          <section class="login-container">
            <div class="login-area">
                <h1>Login your account</h1>

                <form id="loginForm" class="login__form">
                  <div class="login__content grid">
                     <div class="login__box">
                        <h3 class="label">Email</h3>
                        <label for="email" class="login__label"></label>
                        <input type="email" id="email" required placeholder=" " class="login__input">

                     </div>
         
                     <div class="login__box">
                        <h3 class="label">Password</h3>
                        <label for="password" class="login__label"></label>
                        <input type="password" id="password" required placeholder=" " class="login__input">
                        
                     </div>

                     
                  </div>

                  <p id="emailPasswordError"></p>
         
                  <!-- Nút bấm để submit thông tin đăng nhập -->
                  <button type="submit" class="login__button">Login</button>
               </form>

               <p class="login__switch">
                  Don't have an account? 
                  <a id="loginButtonRegister" href="../controllers/admin.php?page=register">Create Account</a>
               </p>
            </div>

          </section>
          </main>

        <script src="../views/js/admin/login.js?v=<?php echo time(); ?>"></script>
    </body>
</html>