<section class="listItem">
    <h2 class="listItemCaption">Create an item</h2>

    <form action="../api/create_product_api.php" method="post">
        <div class="input">
            <h6 class="inputFieldName">Name</h6>
            <label for="name"></label>
            <input type="text" class="inputField" id="name" name="name" required>
        </div>
        
        <div class="input">
            <h6 class="inputFieldName">Price</h6>
            <label for="price"></label>
            <input type="number" class="inputField" id="price" name="price" required>
        </div>

        <div class="input">
            <h6 class="inputFieldName">Category</h6>
            <select id="category" name="category" class="inputField" required>
                <option value="Food">Food</option>
                <option value="Item">Item</option>
            </select>
        </div>

        <div class="input">
            <h6 class="inputFieldName">Image</h6>
            <label for="image"></label>
            <input type="file" id="image" name="image" required>
        </div>

        <div class="input">
            <h6 class="inputFieldName">Description</h6>
            <textarea id="bio" name="bio" placeholder="I like coding on the beach..." required></textarea>
        </div>



        <button type="submit" class="submitButton">
            <p class="submit">
                Save
            </p>
        </button>


    </form>

</section>
