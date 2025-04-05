<main id="foodPage">
    <section>
        <div class="overImage">
            <div class="headImage" id="foodHeadImage1">
                <h1 id="foodFirstLine">Food is coming</h1>
                <p id="foodFirstLineDescription">Explore delicous and nutrious food for your lovely pet</p>
            </div>
        </div>
        
    </section>
    <section class="mainSectionFood">
        <div class="leftbox">
            <h5 class="subCategory">Subcategory</h5>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Bone</p>
            </div>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Cereal</p>
            </div>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Nutritions</p>
            </div>
        </div>
        <div class="listFood">
            <div class="search-bar">
                <div class="searchFood">
                    <!-- AJAX here -->
                    <input id="searchFoodInput" type="text" placeholder="Search">
                    <button type="submit" onclick="searchProduct('searchFoodInput')" class="submitbutton"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="sortFood">
                    <a class="nav-link dropdown-toggle sortFoodName" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ranking-star"></i><p class="sortName">Sort</p>
                        
                    </a>
                    <ul class="dropdown-menu sortFoodItem" >
                        <li><a class="dropdown-item" href="index.php?page=food&sort=None"> None</a></li>
                        <li><a class="dropdown-item" href="index.php?page=food&sort=a-z"><i class="fa-solid fa-arrow-up-z-a"></i> Sort A-Z</a></li>
                        <li><a class="dropdown-item" href="index.php?page=food&sort=z-a"><i class="fa-solid fa-arrow-up-a-z"></i> Sort Z-A</a></li>
                        <li><a class="dropdown-item" href="index.php?page=food&sort=min"><i class="fa-solid fa-arrow-up-9-1"></i> Sort Low to High Price</a></li>
                        <li><a class="dropdown-item" href="index.php?page=food&sort=max"><i class="fa-solid fa-arrow-up-1-9"></i> Sort High to Low Price</a></li>
                    </ul>
                </div>
                <div class="numProducts">
                    <a class="nav-link dropdown-toggle sortFoodName" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-list-ol"></i><p class="sortName">Number of products</p>
                        
                    </a>
                    <ul class="dropdown-menu sortFoodItem">
                        <li><a class="dropdown-item" href="index.php?page=food&limit=12&offset=<?php echo $offset; ?>">12</a></li>
                        <li><a class="dropdown-item" href="index.php?page=food&limit=24&offset=<?php echo $offset; ?>">24</a></li>
                    </ul>

                </div>
            </div>

            <div class="innerfoodList innerfoodList2" id="searchProductId">
                <?php
                    if (empty($foods)) {
                        echo '<p style="color:black;">0 result</p>';
                    } else {
                        for ($i = 0; $i < count($foods); $i++) {
                            echo '<div class="foodItem">
                                    <img src="../views/images/foodPage/' . $foods[$i]->getImage() . '" alt="dogFood' . $i . '" id="dogfood1">
                                    <div class="foodItemName">
                                        <p class="foodItemName1">' . $foods[$i]->getName() . '</p>
                                    </div>
                                    <div class="foodItemPrice">
                                        <div class="foodItemPricePrice">
                                            <p class="foodItemPrice1">$' . number_format($foods[$i]->getPrice(), 2) . '</p>
                                        </div>
                                        <div class="outsideFoodItemButton">
                                            <div class="foodItemButton">
                                                <p class="foodItemButtonContent">Shop Now</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                ?>

            </div>

            <div id="current-page" class="currentPageFoodOuter">
                <div class="currentPageFood">
                    <p class="currentPageInnerFood"><i class="fa-solid fa-eye"></i> Page <?php echo $currentPage?>/<?php echo $totalPage?></p>
                </div>
            </div>
            

            <div id="pagination-bar" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php 
                        if ($currentPage == 1){
                            echo '<li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>';
                        }else{
                            echo '<li class="page-item">
                                    <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($offset - $limit) .'" >Previous</a>
                                </li>';
                        }
                        for($i = 1; $i <= $totalPage; $i++){
                            echo '<li class="page-item">
                                <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($i-1)*$limit .'" >' . $i . '</a>
                            </li>';
                        }
                        // if ($totalPage <= 5){
                        //     for($i = 1; $i <= $totalPage; $i++){
                        //         echo '<li class="page-item">
                        //             <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($i-1)*$limit .'" >' . $i . '</a>
                        //         </li>';
                        //     }
                        // }else if ($currentPage < $totalPage - 3) // -> đang sai logic chỗ này
                        // { // Chỗ này còn thiếu trường hợp ví dụ số trang: 1,2,3,...,6 -> 1,...,4,5,6 => Nếu số trang từ 3 sang 4 thì phải đổi sang như v
                        //     for($i = $currentPage; $i < $currentPage + 3; $i++){
                        //         echo '<li class="page-item">
                        //             <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($i-1)*$limit .'" >'. $i .' </a>
                        //         </li>';
                        //     }
                        //     echo '<li class="page-item">
                        //             <a class="page-link" href="#">...</a>
                        //         </li>';
                        //     echo '<li class="page-item">
                        //         <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($totalPage-1)*$limit .'" >' . $totalPage . '</a>
                        //     </li>';
                        // }else{
                        //     echo '<li class="page-item">
                        //         <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . 0 .'" >' . 1 . '</a>
                        //     </li>';
                        //     echo '<li class="page-item">
                        //             <a class="page-link" href="#">...</a>
                        //         </li>';
                        //     for($i = $totalPage - 2; $i <= $totalPage; $i++){
                        //             echo '<li class="page-item">
                        //                 <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($i-1)*$limit .'" >'. $i .' </a>
                        //             </li>';
                        //         }

                        // }
                        if ($currentPage == $totalPage){
                            echo '<li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                </li>';
                        }else{
                            echo '<li class="page-item">
                                    <a class="page-link" href= "' . 'index.php?page=food&limit='. $limit . '&offset=' . ($offset + $limit) .'" >Next</a>
                                </li>';
                        }

                    ?>
                </ul>
            </div>

        </div>
    </section>
    
</main>