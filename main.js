//cart
let cartIcon = document.querySelector('#cart-icon');
let cart= document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');
// to oper the cart
cartIcon.onclick = () =>{
  cart.classList.add("active")
};
// to clode the cart
closeCart.onclick = () =>{
  cart.classList.remove("active")
};

//proceed to pay
function proceedToPayClicked(){
  alert('Your order is placed');
  let cartContent = document.querySelector('.cart-content');
  console.log("hey")
  cartContent.remove();
  updatetotal();
}

//remove items from cart
function removeCartItem(){
  var buttonClicked = document.querySelector(".cart-box");
  buttonClicked.remove();
  updatetotal();
}

//add to cart                                ctrl shift R: refresh cache memory
function addCartClicked(i){   
  alert("Item added to cart");
  let title = document.getElementsByClassName('product-title')[i].innerText;
  let price = document.getElementsByClassName('product-price-container')[i].innerText;
  let quantity = document.getElementsByClassName('quantity')[i].innerText;
  let productImg = document.getElementsByClassName('product-img')[i].src;
  console.log(title,price,productImg,quantity);
  addProductToCart(title,price,productImg,quantity);
  updatetotal();
}

function addProductToCart(title,price,productImg,quantity){
  let cartShopBox = document.createElement('div');
  cartShopBox.classList.add('cart-box');
  let cartItems = document.getElementsByClassName('cart-content')[0];
  let cartBoxContent = `
  <img src="${productImg}" alt="The product image" class="cart-img">
  <div class="box-detail">
    <div class="cart-product-title">${title}</div>
    <div class="cart-price">Price: ${price}</div>
    <div class="cart-quantity">Quantity: ${quantity}</div>

    <div class="remove-product" onclick="removeCartItem()">
      <i class="fa-solid fa-trash-can cart-remove" ></i>
    </div>
  </div>`
  cartShopBox.innerHTML = cartBoxContent;
  if (cartItems instanceof Element) {
    cartItems.appendChild(cartShopBox);
  } else {
    console.error('cartItems is not a valid DOM element');
  }
}

//update the total
function updatetotal(){
  var total=0;
  console.log('you called the update function');
  const cartBoxes = document.querySelectorAll('.cart-box');
  for (var i = 0; i < cartBoxes.length; i++ ){
    let cartBox = cartBoxes[i];
    let priceElement = cartBox.getElementsByClassName('cart-price')[0]; //hna olt7t cartBox
    console.log('works!!')
    let quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
    let price = parseFloat(priceElement.innerText.replace("Price: $",""));
    let quantity = parseInt(quantityElement.innerText.replace("Quantity:",""));
    total = total + (price * quantity);
  }
  //if price contains some cents value
  total = Math.round(total *100) / 100;
  console.log(total);
  document.getElementsByClassName('total-price')[0].innerText = total + '$';
}
