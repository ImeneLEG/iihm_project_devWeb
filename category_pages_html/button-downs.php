<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button-downs</title>

    <link rel="stylesheet" href="../css-img/css/template_cat.css">
    <link rel="stylesheet" href="../css-img/css/navbar.css">
    <link rel="stylesheet" href="../css-img/css/footer.css">
    
    <link rel="stylesheet" href="../css-bootstrap/bootstrap.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg body-tertiary" style="background-color: rgb(255, 255, 255);">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="pictures/logo_with_background.png"></a>

        <button class="navbar-toggler menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasRightLabel"><img src="pictures/logo_with_background.png"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php#categories">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
        
    <div class="nav_icons">
      <button class="btn_option" id="cart-icon"><div class="option"><img src="pictures/shopping-bag.png" class="shopping_icon"><span class="option-text">My cart</span></div></button>
      <button class="btn_option"><div class="option"><img src="pictures/heart.png" class="favorites_icon"><span class="option-text">My favorites</span></div></button>
      <button class="btn_option last_btn"><div class="option"><img src="pictures/user.png" class="user_icon"><span class="option-text"><a href="login/login.html">Sign up</a></span></div></button>
    </div>
    </nav>
  </header>
  <div class="sidebar">
    <!-- this code is for the cart -->
    <div class="cart">
      <div class="cart-header">
        <h2 class="cart-title">My cart</h2>
      </div>
      <!--cart content-->
      <div class="cart-content"></div>
      <div class="cart-footer">
        <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">0.00DH</div>
        </div>
        <button type="button" class="btn-buy" onclick="proceedToPayClicked()">Checkout</button>
      </div>
    </div>
    <!--close cart-->
    <div class="close">
      <i class="fa-solid fa-xmark fa-2xl" id="close-cart"></i>
    </div>
  </div>
  <script src="js-bootstrap/bootstrap.js"></script>
  <script src="../main.js"></script>



  <div class="container-all">
      <div class="products"></div>
  </div>


    <!-- Site footer -->
    <footer class="site-footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>shipping details</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Our Services</h6>
            <ul class="footer-links">
              <li><a href ="#" >Herbegement</a></li>
              <li><a href ="#" >E-commerce</a></li>
              <li><a href ="#" >Finance</a></li>
              <li><a href ="#" >Start-up</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Social Media</h6>
            <ul class="footer-links">
            <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
              <li><a class="instagram" href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
              <li><a class="linkedin" href="#"><i class="fa-brands fa-linkedin"></i> LinkedIn</a></li>
              <li><a class="whatsapp" href="#"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <a href=""><i class="fa-solid fa-envelope"></i> iihm2023@gmail.com</a>
          </div>
        </div>
      </div>
    </footer>

    <script src="proj.js" type="module"></script>  
    <!-- <script src="rating-system.js" type="module"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      let product = document.querySelector("product");
      function increment(index) {
        const quantityElement = document.getElementsByClassName('quantity')[index];
        let quantity = parseInt(quantityElement.innerText);
        quantity++;
        quantityElement.innerText = quantity;
        console.log(quantity);
      }

      function decrement(index) {
        const quantityElement = document.getElementsByClassName('quantity')[index];
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 0) {
          quantity--;
          quantityElement.innerText = quantity;
          console.log(quantity);
        }
      }
      
      function rating(num) {
        let pt = document.getElementsByClassName("product-title")[num]; //can't do it with querySelector
        let title = pt.innerText;
        console.log("title"+title);
        $.ajax({
          type: "POST",
          url: "data-submit.php",
          data: { title: title },
          success: function(response) {
            //console.log("Title sent to PHP script");
            console.log(title);
          }
        });
        /* console.log(title); 
        return title; */
      }
     
    </script>
</body>
</html>