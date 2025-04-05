<section class="listItem">
    <h2 class="listItemCaption">Edit item</h2>

    <form action="../api/edit_product_api.php" method="post">
        <label for="id"></label>
        <input type="hidden" name="id" id="id" value="<?php echo $currentID ?>">
        <div class="input">
            <h6 class="inputFieldName">Name</h6>
            <label for="name"></label>
            <input type="text" class="inputField" id="name" name="name">
        </div>
        
        <div class="input">
            <h6 class="inputFieldName">Price</h6>
            <label for="price"></label>
            <input type="number" class="inputField" id="price" name="price">
        </div>

        <div class="input">
            <h6 class="inputFieldName">Category</h6>
            <select id="category" name="category" class="inputField">
                <option value="Food">Food</option>
                <option value="Item">Item</option>
            </select>
        </div>

        <div class="input">
            <h6 class="inputFieldName">Image</h6>
            <label for="image"></label>
            <input type="file" id="image" name="image">
        </div>

        <div class="input">
            <h6 class="inputFieldName">Description</h6>
            <textarea id="bio" name="bio" placeholder="I like coding on the beach..."></textarea>
        </div>



        <button type="submit" class="submitButton">
            <p class="submit">
                Save
            </p>
        </button>


    </form>

</section>
