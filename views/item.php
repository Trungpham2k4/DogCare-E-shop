<main id="foodPage">
    <section>
        <div class="overImage">
            <div class="headImage" id="foodHeadImage1">
                <h1 id="foodFirstLine">Top Picks for Happy Pups</h1>
                <p id="foodFirstLineDescription">Discover toys, accessories, and more to keep your dog tail-wagging happy.</p>
            </div>
        </div>
        
    </section>
    <section class="mainSectionFood">
        <div class="leftbox">
            <h5 class="subCategory">Subcategory</h5>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Clothes</p>
            </div>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Dog shampoo</p>
            </div>
            <div class="subCategoryItem">
                <p class="subCategoryItemContent">Toys</p>
            </div>
        </div>
        <div class="listFood">
            <div class="search-bar">
                <div class="searchFood">
                    <!-- AJAX here -->
                    <input id="searchFoodInput" type="text" placeholder="Search">
                    <button type="submit" onclick="searchProduct('searchFoodInput', 'CAT002')" class="submitbutton"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="sortFood">
                    <a class="nav-link dropdown-toggle sortFoodName" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ranking-star"></i><p class="sortName">Sort</p>
                        
                    </a>
                    <ul class="dropdown-menu sortFoodItem" >
                        <li><a class="dropdown-item" href="index.php?page=item&sort=None"> None</a></li>
                        <li><a class="dropdown-item" href="index.php?page=item&sort=a-z"><i class="fa-solid fa-arrow-up-z-a"></i> Sort A-Z</a></li>
                        <li><a class="dropdown-item" href="index.php?page=item&sort=z-a"><i class="fa-solid fa-arrow-up-a-z"></i> Sort Z-A</a></li>
                        <li><a class="dropdown-item" href="index.php?page=item&sort=min"><i class="fa-solid fa-arrow-up-9-1"></i> Sort Low to High Price</a></li>
                        <li><a class="dropdown-item" href="index.php?page=item&sort=max"><i class="fa-solid fa-arrow-up-1-9"></i> Sort High to Low Price</a></li>
                    </ul>
                </div>
                <div class="numProducts">
                    <a class="nav-link dropdown-toggle sortFoodName" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-list-ol"></i><p class="sortName">Number of products</p>
                        
                    </a>
                    <ul class="dropdown-menu sortFoodItem">
                        <li><a class="dropdown-item" href="index.php?page=item&limit=12&offset=<?php echo $offset; ?>">12</a></li>
                        <li><a class="dropdown-item" href="index.php?page=item&limit=24&offset=<?php echo $offset; ?>">24</a></li>
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
                                    <img src="../views/images/itemPage/' . $foods[$i]->getImage() . '" alt="dogItem' . $i . '" id="dogfood1">
                                    <div class="foodItemName">
                                        <p class="foodItemName1">' . $foods[$i]->getName() . '</p>
                                    </div>
                                    <div class="foodItemPrice">
                                        <div class="foodItemPricePrice">
                                            <p class="foodItemPrice1">$' . number_format($foods[$i]->getPrice(), 2) . '</p>
                                        </div>
                                        <div class="outsideFoodItemButton">
                                            <div class="foodItemButton">
                                                <a href="../controllers?index.php&page=product_detail&productID=' .$foods[$i]->getId() . '" class="foodItemButtonContent">Shop Now</a>
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
                                    <a class="page-link" href= "' . 'index.php?page=item&limit='. $limit . '&offset=' . ($offset - $limit) .'" >Previous</a>
                                </li>';
                        }
                        for($i = 1; $i <= $totalPage; $i++){
                            echo '<li class="page-item">
                                <a class="page-link" href= "' . 'index.php?page=item&limit='. $limit . '&offset=' . ($i-1)*$limit .'" >' . $i . '</a>
                            </li>';
                        }
                        if ($currentPage == $totalPage){
                            echo '<li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                </li>';
                        }else{
                            echo '<li class="page-item">
                                    <a class="page-link" href= "' . 'index.php?page=item&limit='. $limit . '&offset=' . ($offset + $limit) .'" >Next</a>
                                </li>';
                        }

                    ?>
                </ul>
            </div>

        </div>
    </section>
    
</main>