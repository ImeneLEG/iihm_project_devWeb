let products = document.querySelector(".products");

async function loadProduct(api) {
    try {
        let data = await fetch(api);
        let response = await data.json();

        console.log(response);
        for (let i = 0; i < response.length; i++) {
            let description = response[i].description;
            let title = response[i].title;
            products.innerHTML += `
                <div class="product">
                    <div class="slider-wrapper">
                        <div class="slider">
                            <img id="slide-1${i}" src="${response[i].image.front}" alt="${response[i].category.name}" class="product-img">
                            <img id="slide-2${i}" src="${response[i].image.back}" alt="${response[i].category.name}" class="product-img">
                        </div>
                        <div class="slider-nav">
                            <a href="#slide-1${i}"></a>
                            <a href="#slide-2${i}"></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h2 class="product-title">${title}</h2>
                        <!-- <h4 class="product-category">${response[i].category.name}</h4> -->
                        <h5 class="size-title">Size</h5>
                        <div class="sizes">
                            <input type="radio" name="size" id="s${i}">
                            <label for="s${i}">S</label>
                            <input type="radio" name="size" id="m${i}">
                            <label for="m${i}">M</label>
                            <input type="radio" name="size" id="l${i}">
                            <label for="l${i}">L</label>
                            <input type="radio" name="size" id="xl${i}">
                            <label for="xl${i}">XL</label>
                            <input type="radio" name="size" id="xxl${i}">
                            <label for="xxl${i}">XXL</label>
                        </div>
                        <h5 class="quantity-title">Quantity</h5>
                        <div class="quantity-input-container">
                            <span class="quantity">1</span>
                            <button class="increment-button" onclick="increment(${i})">+</button>
                            <button class="decrement-button" onclick="decrement(${i})">-</button>
                        </div>
                        <p class="product-description">${description}</p>
                
                        <a class="rating-open" href="review.html" onclick="rating(${i})">REVIEWS</a>
            
                        <div class="product-price-container">
                            <h3 class="product-price">$${response[i].price}</h3>
                            <button data-productId="${response[i].id}" class="add-to-cart" onclick="addCartClicked(${i})">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }
    } catch (e) {
        console.log('Error!');
        console.log(e);
    }
}                         //href="review.html?id=${i} IN THE a ELEMENT

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.href.includes("t-shirts.php")) {
      loadProduct('../json_files/t-shirts.json');
    } else if (window.location.href.includes("button-downs.php")) {
      loadProduct('../json_files/button-downs.json');
    } else if (window.location.href.includes("sweat-shirts.php")) {
        loadProduct('../json_files/sweat-shirts.json');
    } else if (window.location.href.includes("long-sleeves.php")) {
        loadProduct('../json_files/long-sleeves.json');
    } else if (window.location.href.includes("jerseys.php")) {
        loadProduct('../json_files/jerseys.json');
    } else if (window.location.href.includes("accessories.php")) {
        loadProduct('../json_files/accessories.json');
    } else if (window.location.href.includes("iihm.php")) {
        loadProduct('../json_files/iihm.json');
    }
});