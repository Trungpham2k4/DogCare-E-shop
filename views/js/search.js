function searchProduct(inputId){
    const inputText = document.getElementById(inputId).value;

    fetch("http://localhost/mywebsite/api/product_api.php", {  // Gọi đúng API mới tạo
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: inputText })
    })
    .then(response => response.json())
    .then(items => {
        console.log("Server response:", items);
        const currentdiv = document.getElementById('searchProductId');
        currentdiv.innerHTML = '';

        if (items.length == 0){
            currentdiv.innerHTML = `<p style="color:black;">No products found</p>`;
        }
        items.forEach((item, index) => {
            console.log(item.image);
            let newElement = `<div class="foodItem">
                                <img src="../views/images/foodPage/${item.image}" alt="dogFood${index}" id="dogfood1">
                                <div class="foodItemName">
                                    <p class="foodItemName1">${item.name}</p>
                                </div>
                                <div class="foodItemPrice">
                                    <div class="foodItemPricePrice">
                                        <p class="foodItemPrice1">$${parseFloat(item.price).toFixed(2)}</p>
                                    </div>
                                    <div class="outsideFoodItemButton">
                                        <div class="foodItemButton">
                                            <p class="foodItemButtonContent">Shop Now</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            currentdiv.innerHTML += newElement;
        });

        const pagination_bar = document.getElementById('pagination-bar');
        pagination_bar.innerHTML = '';

        const current_page = document.getElementById('current-page');
        current_page.innerHTML = '';
    })
    .catch(error => console.error("Error:", error));
    // fetch("http://localhost/mywebsite/api/product_api.php", {
    //     method: "POST",
    //     headers: { "Content-Type": "application/json" },
    //     body: JSON.stringify({ query: inputText })
    // })
    // .then(response => response.text())  // Đổi từ .json() -> .text() để kiểm tra nội dung
    // .then(data => {
    //     console.log("Server raw response:", data);
    //     return JSON.parse(data);  // Parse JSON sau khi kiểm tra nội dung
    // })
    // .then(items => console.log("Parsed JSON:", items))
    // .catch(error => console.error("Error:", error));
    
};

function testButton(){
    console.log("Testing button");
}