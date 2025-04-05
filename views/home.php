<?php
   // ✅ Session → Dùng cho dữ liệu nhạy cảm (vì lưu trên server, an toàn hơn).
   // ✅ Cookie → Dùng để ghi nhớ đăng nhập hoặc lưu trạng thái trên trình duyệt.
?>

<?php include "../views/header.php"; ?>
<main>

   <!-- Chỗ này nên thêm modal để cho người dùng chấp nhận dùng cookie hoặc k -->



    <section class="pageSection" id="pageSection-1">
        <h2>Welcome to the Dog society</h2>
        <p>Explore variety of accessories and services that leverage your pet's life </p>
         <div class="introHome">
            <img src="../views/images/intro_home.jpg" alt="intro" id="introHomePic">
            <p id="intro_caption">  <!--Chưa responsive -->
               DogCare is dedicated to providing top-notch services for dogs, including grooming, 
               training, and personalized care. 
               Alongside our services, we offer a wide range of dog-related items such as toys, 
               treats, accessories, and essentials. Our mission is to keep your furry friends happy, healthy, and pampered.
            </p>
         </div>
    </section>
         
    <section class="pageSection" id="pageSection-2">
         <h2 id="servicePageSection2">Services</h2>
         <div class="serviceList">
            <div class="serviceMem">
               <img src="../views/images/washDog.jpg" alt="wash" id="washDog">
               <div class="serviceContent">
                  <h1 class="serviceCaption">Washing service</h1>
                  <p class="smallContentPageSection2">
                     DogCare Washing Service offers a gentle bath using dog-safe shampoos for all coat types. Our process includes a warm wash, deep cleanse, and a soft towel or blow-dry, ensuring your dog feels fresh and comfortable. We also clean sensitive areas like ears, paws, and underbellies with care.
                  </p>
                  <p class="smallContentPageSection2">
                     Beyond cleanliness, DogCare promotes skin health by removing dirt, excess oil, and loose fur. We also offer special treatments like anti-itch baths or flea and tick care. Our goal is to keep your dog clean, happy, and relaxed after every wash.
                  </p>
                  <div class="washbutton">
                     <button class="btn btn-success" id="washButton">Explore now</button>
                  </div>
               </div>
            </div>
            <div class="serviceMem">
               <div class="serviceContent">
                  <h1 class="serviceCaption">Haircut service</h1>
                  <p class="smallContentPageSection2">
                     DogCare Haircut Service offers professional grooming to keep your dog looking neat and stylish. Our groomers trim fur according to breed, coat type, and your preferences, ensuring a comfortable and stress-free experience.
                  </p>
                  <p class="smallContentPageSection2">
                     Regular haircuts prevent matting, reduce shedding, and keep your dog’s coat healthy. We also adjust cuts for each season, keeping your pet cool in summer and warm in winter.
                  </p>
                  <div class="washbutton">
                     <button class="btn btn-success" id="washButton">Explore now</button>
                  </div>
               </div>
               <img src="../views/images/hair_cut.webp" alt="wash" id="hairCut">
            </div>
            <div class="serviceMem">
               <img src="../views/images/petHotel.jpg" alt="wash" id="petHotel">
               <div class="serviceContent">
                  <h1 class="serviceCaption">Pet Homestay</h1>
                  <p class="smallContentPageSection2">
                     DogCare Pet Homestay provides a safe and cozy home-away-from-home for your dogs. With spacious, clean spaces and constant care, we ensure your pets feel comfortable and relaxed. Our staff offers personalized attention, including feeding, playtime, and daily walks to keep your dog happy and active.
                  </p>
                  <p class="smallContentPageSection2">
                     Safety and well-being are our top priorities. We maintain a secure environment, monitor each pet's health, and cater to special needs like medication or specific diets. At DogCare, your furry friend enjoys a fun, loving stay while you're away.
                  </p>
                  <div class="washbutton">
                     <button class="btn btn-success" id="washButton">Explore now</button>
                  </div>
               </div>
            </div>
         </div>
    </section>

    <section class="pageSection" id="pageSection-3">
         <h2>Categories</h2>
         <div class="categoriesList">
            <!--########################################## Food ##################################################### -->


            <div class="foodList">
               <h3 id="foodHeader">Food</h3>
               <div class="innerfoodList">
                  <div class="foodItem">
                     <img src="../views/images/foodPage/dogFood1.jpg" alt="dogFood1" id="dogfood1">
                     <div class="foodItemName">
                        <p class="foodItemName1">Meat Plus</p>
                     </div>
                     <div class="foodItemPrice">
                        <div class="foodItemPricePrice">
                           <p class="foodItemPrice1">$45.00</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="foodItem">
                     <img src="../views/images/foodPage/dogFood2.jpg" alt="dogFood1" id="dogfood1">
                     <div class="foodItemName">
                        <p class="foodItemName1">Chicken-flavored dog food</p>
                     </div>
                     <div class="foodItemPrice">
                        <div class="foodItemPricePrice">
                           <p class="foodItemPrice1">$35.00</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="foodItem">
                     <img src="../views/images/foodPage/dogFood3.jpg" alt="dogFood1" id="dogfood1">
                     <div class="foodItemName">
                        <p class="foodItemName1">Nutritional food for Chihuahuas</p>
                     </div>
                     <div class="foodItemPrice">
                        <div class="foodItemPricePrice">
                           <p class="foodItemPrice1">$20.00</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="foodItem">
                     <img src="../views/images/foodPage/dogFood4.jpg" alt="dogFood1" id="dogfood1">
                     <div class="foodItemName">
                        <p class="foodItemName1">Chicken-flavored bone</p>
                     </div>
                     <div class="foodItemPrice">
                        <div class="foodItemPricePrice">
                           <p class="foodItemPrice1">$35.000</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>

            <!--########################################## Item ##################################################### -->

            <div class="groceries">
               <h3 id="itemHeader">Item</h3>
               <div class="innergroceryList">
                  <div class="groceryItem">
                     <img src="../views/images/grocery1.webp" alt="grocery1" id="grocery1">
                     <div class="groceryItemName">
                        <p class="groceryItemName1">Grain Recipe IAMSO</p>
                     </div>
                     <div class="groceryItemPrice">
                        <div class="groceryItemPricePrice">
                           <p class="groceryItemPrice1">$45.000</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>

                  <div class="groceryItem">
                     <img src="../views/images/grocery2.webp" alt="grocery1" id="grocery1">
                     <div class="groceryItemName">
                        <p class="groceryItemName1">Grain Recipe IAMSO</p>
                     </div>
                     <div class="groceryItemPrice">
                        <div class="groceryItemPricePrice">
                           <p class="groceryItemPrice1">$45.000</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>

                  <div class="groceryItem">
                     <img src="../views/images/grocery3.webp" alt="grocery1" id="grocery1">
                     <div class="groceryItemName">
                        <p class="groceryItemName1">Grain Recipe IAMSO</p>
                     </div>
                     <div class="groceryItemPrice">
                        <div class="groceryItemPricePrice">
                           <p class="groceryItemPrice1">$45.000</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>


                  <div class="groceryItem">
                     <img src="../views/images/grocery4.webp" alt="grocery1" id="grocery1">
                     <div class="groceryItemName">
                        <p class="groceryItemName1">Grain Recipe IAMSO</p>
                     </div>
                     <div class="groceryItemPrice">
                        <div class="groceryItemPricePrice">
                           <p class="groceryItemPrice1">$45.000</p>
                        </div>
                        <div class="outsideFoodItemButton">
                           <div class="foodItemButton">
                              <a href="#" class="foodItemButtonContent">Shop Now</a>
                           </div>
                        </div>
                        
                     </div>
                  </div>

         
               </div>
            </div>
         </div>
    </section>

    <section class="pageSection" id="pageSection-4">
         <h2>About us</h2>
         <div class="shopInfo">
            <h4>Our Story</h4>
            <p>Founded in 2025, DogCare was born from a deep love for pets and a passion for their well-being.</p>
        </div>
        <div class="shopInfo">
            <h4>Our Mission</h4>
            <p>At DogCare, our mission is to create a world where every pet receives the love, care, and nutrition they deserve.</p>
        </div>
        <div class="shopInfo">
            <h4>What We Offer</h4>
            
                <p>🐾 Nutritious pet food – Ensuring your pets receive balanced, healthy meals.</p>
                <p>🏡 Comfortable pet accessories – High-quality beds, leashes, and toys.</p>
                <p>💙 Health & wellness care – Supplements and grooming essentials for happy pets.</p>
         
        </div>
        <div class="shopInfo">
            <h4>Join Us in Caring for Pets!</h4>
            <p>We believe that pets are family. Through our dedication to quality and customer service, we aim to make pet ownership a joyful and rewarding experience.</p>
            <p>📍 <strong>Location:</strong> 123 Pet Street, DogCity, DC 10001</p>
            <p>📞 <strong>Contact Us:</strong> (+1) 234-567-890</p>
            <p>📧 <strong>Email:</strong> support@dogcare.com</p>
        </div>
    </section>
 </main>

<?php include "../views/footer.php"; ?>