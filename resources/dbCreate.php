<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "dogcare";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        $conn->close();
        die("Connection failed: " . $conn->connect_error);
    }
?>


<?php
    // SETUP Database and tables
    $exists = $conn->query("SHOW DATABASES LIKE '$dbName'");
    

    function createTables(){
        global $conn;
        global $dbName;
        $conn->select_db($dbName);
        $existsCategory = $conn->query("SHOW TABLES LIKE 'categories'");
        if ($existsCategory->num_rows == 0){
            $categoryTable = "
            create table categories(
                ID VARCHAR(50) NOT NULL UNIQUE,
                NAME VARCHAR(50) NOT NULL UNIQUE,
                PRIMARY KEY (ID)
            );";
            $conn->query($categoryTable);
        }
        
        $existsProduct = $conn->query("SHOW TABLES LIKE 'products'");
        if ($existsProduct->num_rows == 0){
            $productTable = "
        create table products(
            ID VARCHAR(50) NOT NULL UNIQUE,
            NAME VARCHAR(50) NOT NULL UNIQUE,
            DESCRIPTION VARCHAR(500), 
            PRICE FLOAT(10,2) NOT NULL,
            CATEGORY_ID VARCHAR(50) NOT NULL,
            IMAGE VARCHAR(200) NOT NULL,
            PRIMARY KEY (ID),
            FOREIGN KEY (CATEGORY_ID) REFERENCES categories(ID) ON UPDATE CASCADE ON DELETE CASCADE
            );
        ";

        $conn->query($productTable);
        }
        
    }

?>

<?php
    // Insert data
    function insertData(){
        global $conn;
        global $dbName;
        $conn->select_db($dbName);
        $categoryData = "
        INSERT INTO categories (ID, NAME) VALUES
('CAT001', 'Dog Food'),
('CAT002', 'Dog Toys'),
('CAT003', 'Grooming Supplies'),
('CAT004', 'Health & Care'),
('CAT005', 'Accessories');
        ";
        $productData = "
        INSERT INTO products (ID, NAME, DESCRIPTION, PRICE, CATEGORY_ID, IMAGE) VALUES
-- Dog Food
('PROD001', 'Meat Plus', 'Rich in protein, perfect for active dogs.', 45.00, 'CAT001', 'dogFood1.jpg'),
('PROD002', 'Chicken-flavored Dog Food', 'Nutritious dog food with chicken flavor, suitable for all breeds.', 35.00, 'CAT001', 'dogFood2.jpg'),
('PROD003', 'Nutritional food for Chihuahuas', 'Ideal for chihuahuas.', 20.00, 'CAT001', 'dogFood3.jpg'),
('PROD004', 'Chicken-flavored bone', 'Nutritious dog food with chicken flavor, suitable for all breeds.', 35.00, 'CAT001', 'dogFood4.jpg'),
('PROD005', 'Royal Canin Mini Puppy', 'Specially formulated to meet the nutritional needs of small breed puppies. This puppy food (for small breed dogs) is designed to provide nutrition tailored to the actual requirements of growing puppies.', 100.00, 'CAT001', 'dogFood5.webp'),
('PROD006', 'Freshening Biscuit Bacon Beef', 'Freshening Biscuit Bacon Beef contains delicious fresh beef. Through a meticulous drying process, the nutritional content of the beef is preserved, providing your pet with essential protein and energy.', 25.00, 'CAT001', 'dogFood6.webp'),
('PROD007', 'IRIS OHYAMA One Care Beef', 'IRIS OHYAMA One Care Beef Dog Pate contains ingredients such as chicken, beef, carrots, peas, and rice.', 35.00, 'CAT001', 'dogFood7.webp'),
('PROD008', 'PEDIGREE Pouch Beef', 'PEDIGREE Pouch Beef Dog Pate in Sauce offers an enticing flavor designed for picky eaters. It can be mixed with rice or dry kibble to enhance the aroma of the food.', 25.00, 'CAT001', 'dogFood8.webp'),
('PROD009', 'ROYAL CANIN Poodle Puppy', 'ROYAL CANIN Poodle Puppy Dog Food is specially formulated for all Poodle breeds, including Teacup, Tiny Poodle, Toy Poodle, and Standard Poodle under 10 months old.', 185.00, 'CAT001', 'dogFood9.webp'),
('PROD010', 'VEGEBRAND Orgo Nutrients Beef', 'VEGEBRAND Orgo Nutrients Beef Dog Bone is designed for medium-sized dog breeds and contains a delicious beef flavor.', 25.00, 'CAT001', 'dogFood10.webp'),
('PROD011', 'High Calcium Cheese Dog Bone', 'High Calcium Cheese Dog Bone contains a high calcium content, suitable for all dog breeds of all ages.', 50.00, 'CAT001', 'dogFood11.jpg'),
('PROD012', 'IRIS OHYAMA Pate', 'IRIS OHYAMA Benefit For Eyes & Liver Dog Pate is suitable for all dog breeds. Made entirely from natural ingredients, it supports liver function and promotes eye health.', 35.00, 'CAT001', 'dogFood12.webp'),
('PROD013', 'ROYAL CANIN Poodle Adult', 'ROYAL CANIN Poodle Adult Dog Food is specially formulated for all Poodle breeds, including Teacup, Tiny Poodle, Toy Poodle, and Standard Poodle from 10 months old and above.', 155.00, 'CAT001', 'dogFood13.webp'),
('PROD014', 'Chicken Potato Soft Kibble', 'Made from fresh ingredients such as lamb, deboned chicken, brown rice, oats, and salmon oil. This product is not only delicious, easy to chew, and digest, but also particularly beneficial for the health and development of puppies under 1 year old.', 240.00, 'CAT001', 'dogFood14.webp'),
('PROD015', 'Dog Dental Chew Bone', 'VEGEBRAND Orgo Freshening Peppermint Dog Dental Chew Bone is a nutritional product designed for dogs over 5 months old.', 105.00, 'CAT001', 'dogFood15.webp'),
('PROD016', 'Milk-flavored Dog Chew Bone', 'VEGEBRAND 360 Calcium Milk Bone Dog Chew is suitable for small, medium, and large dogs. This product works like a dog treat — it can be given directly, used as a training reward, or as a treat for positive reinforcement.', 50.00, 'CAT001', 'dogFood16.jpg'),
('PROD017', 'Goat’s Milk New Zealand', 'BBN Goat’s Milk New Zealand Powdered Milk for Dogs is suitable for all dog breeds and ages, from newborn puppies to pregnant and nursing mothers.', 320.00, 'CAT001', 'dogFood17.webp'),
('PROD018', 'High Calcium Oat Milk Dog Bone', 'VEGEBRAND Orgo High Calcium Oat Milk Dog Bone with cow milk flavor is a nutritional product designed for medium-sized dog breeds.', 25.00, 'CAT001', 'dogFood18.jpg'),
('PROD019', 'Pate with Beef and Vegetables', 'IRIS OHYAMA Chicken Beef Vegetable Dog Pate is suitable for all dog breeds. This product is designed to satisfy even the pickiest eaters.', 35.00, 'CAT001', 'dogFood19.webp'),
('PROD020', 'Grill Beef and Chicken Dog Pate', 'JERHIGH Chicken Beef Grilled Chunks Carrot In Gravy Dog Pate comes in an all-new packaging design. This product provides complete protein and nutritional value, enriched with Omega 3 and zinc to support your dog’s skin and coat health while helping to reduce signs of aging.', 35.00, 'CAT001', 'dogFood20.webp'),
('PROD021', 'Chicken Meatball Dog Pate', 'JERHIGH Chicken Chunks Vegetable In Gravy Dog Pate comes in an all-new packaging design. Made with premium chicken and fresh vegetables, the ingredients are cut into large, tender chunks and soaked in a rich, savory gravy.', 35.00, 'CAT001', 'dogFood21.webp'),
('PROD022', 'Multivitamin Supplement for Dogs', 'VEGEBRAND Fruit Vitamin Multivitamin Supplement for Dogs is suitable for all dog breeds at every stage of development.', 170.00, 'CAT001', 'dogFood22.webp'),
('PROD023', 'Beef-flavored Dog Chew Bone', 'VEGEBRAND 360 Delicious Beef Bone Dog Chew is suitable for small, medium, and large dog breeds. It can be given directly to dogs or used as a training treat.', 170.00, 'CAT001', 'dogFood23.jpg'),
('PROD024', 'Dog Pate for Shedding Control', 'IRIS OHYAMA Benefit For Fur Dog Pate is suitable for all dog breeds. Made entirely from natural ingredients, it helps reduce shedding and supports healthy fur.', 35.00, 'CAT001', 'dogFood24.webp'),
('PROD025', 'Milk-flavored Dog Dental Candy', 'VEGEBRAND 7 Dental Effects Milk In Dental Gum is designed for all dog breeds, helping clean teeth while providing a tasty milk flavor.', 95.00, 'CAT001', 'dogFood25.webp'),
('PROD026', 'One Care Chicken Meat', 'IRIS OHYAMA One Care Chicken Meat Dog Pate is suitable for all dog breeds. Made entirely from natural ingredients and chicken, it provides a healthy and nutritious meal for your pet.', 35.00, 'CAT001', 'dogFood26.webp'),
('PROD027', 'PEDIGREE Pouch Chicken', 'PEDIGREE Pouch Chicken Dog Pate in Sauce offers an enticing flavor designed for picky eaters. It can be mixed with rice or dry kibble to enhance the food’s aroma. Additionally, when other pet food is unavailable, it can be served directly to your dog.', 25.00, 'CAT001', 'dogFood27.webp'),
('PROD028', 'Mint-flavored Chew Bone', 'VEGEBRAND Orgo Breath Freshening Peppermint Dog Dental Chew Bone contains natural peppermint ingredients that help eliminate bacteria causing bad breath, clean teeth, and protect against tartar buildup. Suitable for dogs over 5 months old, this product can also be used as a treat or reward for your pet.', 50.00, 'CAT001', 'dogFood28.webp'),
('PROD029', 'Beef Rice Dog Pate', 'IRIS OHYAMA Beef Rice Dog Pate is suitable for all dog breeds. Made entirely from natural ingredients, including beef and rice, it provides a wholesome and nutritious meal for your pet.', 35.00, 'CAT001', 'dogFood29.webp'),
('PROD030', 'ROYAL CANIN Mini Adult', 'ROYAL CANIN Mini Adult Dog Food is specially formulated to meet the nutritional needs of small breed adult dogs from 10 months old and above.', 185.00, 'CAT001', 'dogFood30.webp'),
('PROD031', 'Beef Stick Dog Treat', 'JERHIGH Beef Stick Dog Treat features a signature beef flavor, a favorite among dogs worldwide. This treat provides valuable nutrition for pets, with protein that supports muscle development and aids in tissue repair.', 55.00, 'CAT001', 'dogFood31.webp'),
('PROD032', 'Roasted Duck Gravy Pate', 'JERHIGH Roasted Duck Gravy Dog Pate comes in an all-new packaging design. Made primarily from chicken and fresh vegetables, the ingredients are cut into large, tender chunks soaked in a rich gravy. This product is high in protein and nutritional value, enriched with Omega 3 and zinc to promote healthy skin and a shiny coat for your dog.', 35.00, 'CAT001', 'dogFood32.webp'),
('PROD033', 'Meat as Meals Beef Recipe', 'JERHIGH Meat as Meals Beef Recipe Soft Kibble is suitable for all dog breeds, from puppies to adults.', 275.00, 'CAT001', 'dogFood33.webp'),
('PROD034', 'Chicken Liver Chunks Pate', 'JERHIGH Chicken Liver Chunks In Gravy Dog Pate comes in an all-new packaging design. Rich in nutrients, it contains vitamin E to support healthy skin and a shiny coat. The irresistible flavor will keep your dog coming back for more!', 35.00, 'CAT001', 'dogFood34.webp'),
('PROD035', 'Chicken Sausage Flavor Treat', 'JERHIGH Salami Chicken Sausage Dog Treat provides essential energy for all dog breeds.', 55.00, 'CAT001', 'dogFood35.webp'),
('PROD036', 'Large Cheese Bone', 'VEGEBRAND 7 Dental Effects Large Cheese Bone is a chew bone for dogs with seven benefits, featuring multiple nutritional formulas to support your dog\'s health.', 50.00, 'CAT001', 'dogFood36.jpg'),
('PROD037', 'Benefit For Teeth Pate', 'IRIS OHYAMA Benefit For Teeth Dog Pate is suitable for all dog breeds, specially formulated to support dental health.', 35.00, 'CAT001', 'dogFood37.webp'),
('PROD038', 'ROYAL CANIN Medium Adult', 'ROYAL CANIN Medium Adult Dog Food is designed for medium breed adult dogs aged 12 months and older. It features a specially formulated recipe to meet their unique nutritional needs.', 180.00, 'CAT001', 'dogFood38.webp'),
('PROD039', 'ROYAL CANIN Maxi Adult', 'ROYAL CANIN Maxi Adult Dog Food is formulated for large breed adult dogs from 15 months and older. It is commonly used for breeds such as Alaskan Malamute, Husky, Samoyed, German Shepherd (GSD), Golden Retriever, Labrador, Akita, Beauceron, and Rottweiler.', 180.00, 'CAT001', 'dogFood39.webp'),
('PROD040', 'Fresh Breath Bone', 'VEGEBRAND 360 Fresh Breath Bone is suitable for small, medium, and large breed dogs. It can be given directly as a treat or used as a reward during training sessions.', 50.00, 'CAT001', 'dogFood40.jpg'),
('PROD041', 'One Care Fish Pate', 'IRIS OHYAMA One Care Fish Dog Pate is suitable for all dog breeds. Made from completely natural ingredients, with fish as the main component.', 35.00, 'CAT001', 'dogFood41.webp'),
('PROD042', 'Milk Flavor Toothbrush-Shaped', 'VEGEBRAND Orgo High Calcium Milk Flavor Toothbrush-Shaped Dog Chew Bone is a nutritious product suitable for all dog breeds', 50.00, 'CAT001', 'dogFood42.webp'),
('PROD043', 'Goat Milk Calcium Tablet', 'VEGEBRAND Goat Milk Calcium Tablet is a calcium supplement suitable for all dog breeds at every stage of development.', 170.00, 'CAT001', 'dogFood43.webp'),
('PROD044', 'One Care Gizzard', 'IRIS OHYAMA One Care Gizzard Dog Pate is a product suitable for all dog breeds. Made from completely natural ingredients.', 35.00, 'CAT001', 'dogFood44.webp'),
('PROD045', 'Ca+MG Big Bone Bar', 'VEGEBRAND Ca+MG Big Bone Bar is a calcium supplement for all dog breeds at every stage of development.', 240.00, 'CAT001', 'dogFood45.webp'),
('PROD046', 'JERHIGH Chicken Jerky', 'JERHIGH Chicken Jerky Dog Treat is suitable for all dog breeds.', 55.00, 'CAT001', 'dogFood46.webp'),
('PROD047', 'ZENITH Adult Lamb Potato', 'ZENITH Adult Lamb Potato Soft Kibble is made from nutritious ingredients like fresh lamb, deboned chicken, brown rice, oats, and salmon oil. The product provides high moisture content, low salt, and soft kibble that\'s easy to chew and digest — especially beneficial for the health and development of adult dogs over 1 year old.', 240.00, 'CAT001', 'dogFood47.webp'),
('PROD048', 'JERHIGH Grilled Chicken Chunk', 'JERHIGH Grilled Chicken Chunks In Gravy is a premium dog food with a brand-new packaging design. It offers high nutritional value, packed with calcium and vitamin D to strengthen bones and teeth, while also supporting muscle growth for your dog.', 35.00, 'CAT001', 'dogFood48.webp'),
('PROD049', 'Endi Chew Dental Flavor', 'VEGEBRAND Orgo Endi Chew Dental Flavor is a natural ingredient-based treat for dogs, offering excellent nutrition. It supports soft and shiny skin and fur, helps eliminate 99% of stubborn plaque, reduces bad breath, boosts digestion, and prevents intestinal diseases.', 50.00, 'CAT001', 'dogFood49.webp'),
('PROD050', 'IRIS OHYAMA For Puppy', 'IRIS OHYAMA For Puppy wet food is a specially formulated product for all puppy breeds. Made from natural ingredients, this pate provides essential nutrients to support the overall development of puppies during their early stages of life.', 35.00, 'CAT001', 'dogFood50.webp'),
('PROD051', 'JERHIGH Milky Sticks', 'JERHIGH Milky Sticks dog treats are suitable for all dog breeds. Made with milk flavor, these treats provide essential nutrients and are a delicious reward for your furry friend.', 55.00, 'CAT001', 'dogFood51.webp'),
('PROD052', 'JERHIGH Strawberry Sticks', 'JERHIGH Strawberry Sticks are a fantastic snack for your pet. The product is packed with essential nutrients and vitamins to keep your dog healthy. Combined with an irresistible strawberry flavor, it also provides a source of energy from high-quality protein.', 55.00, 'CAT001', 'dogFood52.webp'),
('PROD053', 'Nutrition Supplement Gel', 'BIOLINE Nutrition Supplement Gel is a nutritional product suitable for all dog breeds.', 170.00, 'CAT001', 'dogFood53.webp'),
('PROD054', 'JERHIGH Spinach Stick', 'JERHIGH Spinach Stick is a treat for all dog breeds, made with nutritious spinach to keep your pet healthy and happy.', 55.00, 'CAT001', 'dogFood54.webp'),
('PROD055', 'Bacon Stick', 'VEGEBRAND 7 Dental Effects Bacon Stick is a chew stick for all dog breeds, featuring a smoky bacon flavor. It helps clean teeth, freshen breath, and provides essential nutrients for your pet\'s overall health.', 150.00, 'CAT001', 'dogFood55.webp'),
('PROD056', 'BBN Salmon Slices', 'BBN Salmon Slices dog treats are made from natural ingredients, offering a delicious salmon flavor. This product provides essential nutrients to support your dog\'s health and well-being. Suitable for all dog breeds.', 55.00, 'CAT001', 'dogFood56.webp'),
('PROD057', 'BBN Cheese Slices', 'BBN Cheese Slices dog treats are specially designed for your furry friend. With a rich cheese flavor, this product provides essential nutrients and is suitable for all dog breeds.', 55.00, 'CAT001', 'dogFood57.webp'),
('PROD058', 'Orgo Beef Flavor Nutrients', 'VEGEBRAND Orgo Beef Flavor Nutrients dental chew bones are a nutritious product specially designed for all dog breeds. They help clean teeth, freshen breath, and provide essential nutrients to support your dog\'s overall health.', 50.00, 'CAT001', 'dogFood58.webp'),
('PROD059', 'Roast Beef Stick', 'VEGEBRAND 7 Dental Effects Roast Beef Stick is a special treat designed for your beloved dogs. It not only satisfies their chewing instincts but also helps clean their teeth, freshen breath, and support oral health—all while delivering the delicious flavor of roasted beef!', 10.00, 'CAT001', 'dogFood59.webp'),
('PROD060', 'ROYAL CANIN Maxi Puppy', 'ROYAL CANIN Maxi Puppy is specially formulated for large breed puppies under 15 months old. It is commonly used for breeds like Alaskan Malamute, Husky, Samoyed, German Shepherd (Becgie GSD), Golden Retriever, Labrador, Akita, Beauceron, and Rottweiler.', 225.00, 'CAT001', 'dogFood60.webp'),
('PROD061', 'JERHIGH Hot Dog Bar', 'JERHIGH Hot Dog Bar Beef Flavour comes in a brand-new packaging design. This delicious treat combines the rich flavors of real chicken and beef, crafted into a sausage bar with a high-quality casing. Perfect for pampering your furry friend with both taste and nutrition!', 60.00, 'CAT001', 'dogFood61.webp');
        ";
        $conn->query($categoryData);
        $conn->query($productData);
    }
?>

<?php
    if ($exists->num_rows == 0){
        $newDB = "CREATE DATABASE $dbName";
        $conn->query($newDB);
        createTables();
        insertData();
        $conn->close();
    }
?>