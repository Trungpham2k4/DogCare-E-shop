

<section class="listItem">
    <h2 class="listItemCaption" id="cap">Food List</h2>

    <div class="foodItemNavigation">
        <div class="FoodNav">
            <a href="../controllers/admin.php?page=home" class="FoodNavLink">Food</a>
        </div>
        <div class="ItemNav">
            <a href="../controllers/admin.php?page=item" class="ItemNavLink">Item</a>
        </div>
    </div>

    <div class="createItemButton">
        <a class="createButton" href="../controllers/admin.php?page=create">
            <p>Create new item</p>
        </a>
    </div>

    <?php
        if (empty($listItem)){
            echo '<p>0 items created</p>';
        }else{
            for ($i=0; $i < count($listItem); $i++) { 
                echo 
            '
                <div class="mainItem">
                    <div class="content">
                        <h3 class="productname">' . $listItem[$i]->getName() .  '</h3>

                        <div class="otherContent">
                            <p class="price">Price: $' . number_format($listItem[$i]->getPrice(), 2) . '</p>
                        </div>
                    </div>

                    <div class="option">
                        <div class="edit">
                            <!-- Chỗ này khi thêm php sẽ cần Id của product -->
                            <a href="../controllers/admin.php?page=edit&productID=' . $listItem[$i]->getId() .'" class="editLink">Edit</a>
                        </div>
                        <div class="delete">
                            <a href="../api/delete_product_api.php?productID=' . $listItem[$i]->getId() .'" class="deleteLink">Delete</a>
                        </div>
                    </div>
                </div>
            ';
            }
        }
    ?>
</section>

        

