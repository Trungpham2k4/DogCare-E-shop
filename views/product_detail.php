<?php require_once "../views/header.php"; ?>
<link rel="stylesheet" href="../views/css/product_detail.css?v=<?php echo time()?>">
<main>
   <section class="product-detail-container">
    <h1 class="product-detail-cap">Product detail</h1>
        <?php
            $imagePage = $current_product->getCategoryId() === "CAT001" ? "foodPage" : "itemPage";
            if ($current_product != null){
                echo 
                '
    <div class="product-image-container">
        <div class="image-container">
            <img src="../views/images/'. $imagePage  .'/'. $current_product->getImage(). '" alt="food for dogs" class="image-detail">
        </div>
        <div class="name-price-container">
            <h1>'. $current_product->getName()   . '</h1>
            <h4>Price: $'. number_format($current_product->getPrice(), 2) .'</h4>
            <h4>Category: '. ($current_product->getCategoryId() === "CAT001" ? "Food" : "Item")  .'</h4>
            <div class="product-description">
                <h2>Description</h2>
                <p>'. $current_product->getDescription() .'</p>
            </div>
            <div class="input-num-products">
                <h6>Number:</h6>
                <label for="num"></label>
                <input type="number" name="num" id="num">
            </div>
            <div class="order-purchase-container">
                <div class="order-button-container">
                    <a href="#" class="order-button">Order</a>
                </div>
                <div class="purchase-button-container">
                    <a href="#" class="order-button">Purchase</a>
                </div>
            </div>
        </div>
    </div>
                ';
            }



        ?>
    

      


   </section>
</main>
<?php require_once "../views/footer.php"; ?>
