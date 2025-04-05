<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../views/css/admin/add_edit.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../views/css/admin/styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- <link rel="image" href="../views/images/*"> -->
        <script src="../views/js/admin/dashboard.js?v=<?php echo time(); ?>"></script>
    </head>
    
    <body>
        <header>
          <nav class="navbar">
            <div class="logo-brand">
            <img width="45" height="45" src="https://img.icons8.com/ios/45/dog-bone.png" alt="dog-bone"/>
              <p class="brandName">DogCare</p>
            </div>
            <div class="navItem" id="navItemDashBoard">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256">
    <g fill="#344e41" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-0.26712,0.00003 -0.52312,0.10694 -0.71094,0.29688l-10.08594,8.80078c-0.12774,0.09426 -0.20313,0.24359 -0.20312,0.40234c0,0.27614 0.22386,0.5 0.5,0.5h2.5v8c0,0.552 0.448,1 1,1h4c0.552,0 1,-0.448 1,-1v-6h4v6c0,0.552 0.448,1 1,1h4c0.552,0 1,-0.448 1,-1v-8h2.5c0.27614,0 0.5,-0.22386 0.5,-0.5c0.00001,-0.15876 -0.07538,-0.30808 -0.20312,-0.40234l-10.08008,-8.79492c-0.00194,-0.00196 -0.0039,-0.00391 -0.00586,-0.00586c-0.18782,-0.18994 -0.44382,-0.29684 -0.71094,-0.29687z"></path></g></g>
    </svg>
              <a href="../controllers/admin.php?page=home" class="navText" id="navTextDashBoard" style="color: #344e41; ">Dashboard</a></a>
            </div>
          </nav>
        </header>
        <main>
          <section class="searchBar">
            <div class="titleSide">
              <button id="toggleNav" class="toggle-btn">
                ☰
              </button>
              <!-- <p id="titleSearch">Home</p> -->
            </div>
            <div class="search-avatar">
              <div class="searchArea">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search something " id="search-input" autocomplete="off" onsubmit="">
              </div>
              <img class="avatar" onclick="toggleDropdown()" width="40" height="40" src="https://img.icons8.com/color/40/circled-user-male-skin-type-1-2--v1.png" alt="circled-user-male-skin-type-1-2--v1"/>
              <div id="dropdown-menu" class="dropdown-menu">
                  <a href="#">Profile</a>
                  <a href="#">Settings</a>
                  <a href="../api/admin_logout.php">Logout</a>
              </div>
          </section>