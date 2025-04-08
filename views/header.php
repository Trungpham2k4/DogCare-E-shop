<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>DogCare | Home</title>
 <link rel="icon" type="image/png" href="../views/images/dog.png">
 <link rel="stylesheet" href="../views/css/food.css?v=<?php echo time(); ?>">
 <link rel="stylesheet" href="../views/css/style.css?v=<?php echo time(); ?>">
 <script src="../views/js/main.js?v=<?php echo time();?>" rel="script"></script>
 <script src="../views/js/search.js?v=<?php echo time();?>" rel="script"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="scrolled">
 <header>
    <nav>
         <button type="button" id="nav-toggle">☰</button>
         <img src="../views/images/dog.png" alt="Icon" id="dog-image">
         <div class="nav-element" id="nav-element">
            <ul>
               <li><a href="index.php?page=home">Home</a></li>
               <li><a href="index.php?page=about">About</a></li>
               <li class="nav-item dropdown">
                  <a id="dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Categories
                     </a>
                  <ul class="dropdown-menu" >
                     <li><a class="dropdown-item" href="index.php?page=food">Food</a></li>
                     <li><a class="dropdown-item" href="index.php?page=item">Items</a></li>
                  </ul>
               </li>
               <li><a href="index.php?page=service">Services</a></li>
               <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
         </div>
         <?php if (isset($_SESSION['user_email'])):?>
            <div class="Login-SignUp">
               <a href="../api/logout_api.php" id="Logout">Logout</a>
            </div>
         <?php else: ?>
            <div class="Login-SignUp">
               <a href="../controllers/index.php?page=login" id="Login">Login</a><a href="../controllers/index.php?page=login" id="SignUp">/SignUp</a>
            </div>
         <?php endif; ?>

    </nav>
 </header>