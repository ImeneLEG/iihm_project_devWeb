<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'JVprog97#'; //to be changed by your password
    $databasename = 'htmlpages';

    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if(!$conn) {
        echo "Error!" . mysqli_connect_error();
    }

    $html_folder = "category_pages_html";
    if (!file_exists($html_folder)) {
        mkdir($html_folder);
    }

    $sql = "SELECT * FROM pages";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $category = $row['category'];
        $url = $row['url'];

        $html = file_get_contents("template_category.php"); //.html

        $html = str_replace("{{category}}", $category, $html);
        $html = str_replace('<script src="category_pages_html/proj.js" type="module"></script>', '<script src="proj.js" type="module"></script>', $html);
        $html = str_replace('<script src="category_pages_html/rating-system.js" type="module"></script>', '<script src="rating-system.js" type="module"></script>', $html);
        $html = str_replace('<link rel="stylesheet" href="css-img/css/template_cat.css">', '<link rel="stylesheet" href="../css-img/css/template_cat.css">', $html);

        $html = str_replace('<link rel="stylesheet" href="css-img/css/navbar.css">', '<link rel="stylesheet" href="../css-img/css/navbar.css">', $html);
        $html = str_replace('<link rel="stylesheet" href="css-bootstrap/bootstrap.css">', '<link rel="stylesheet" href="../css-bootstrap/bootstrap.css">', $html);
        $html = str_replace('<link rel="stylesheet" href="css-img/css/footer.css">', '<link rel="stylesheet" href="../css-img/css/footer.css">', $html);

        $html = str_replace('<a class="nav-link" href="index.php#categories">Product</a>', '<a class="nav-link" href="../index.php#categories">Product</a>', $html);
        $html = str_replace('<a class="nav-link active" aria-current="page" href="index.php#home">Home</a>', '<a class="nav-link active" aria-current="page" href="../index.php#home">Home</a>', $html);
        
        $html = str_replace('<script src="main.js"></script>', '<script src="../main.js"></script>', $html);
        $html = str_replace('url: "category_pages_html/data-submit.php",', 'url: "data-submit.php",', $html);
        
        $filename = $html_folder . '/' . basename($url); /*basename => trailing name(ignores path and gives you file)*/
        file_put_contents($filename, $html);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIHM</title>

    <link rel="stylesheet" href="css-img/css/style.css">
    <link rel="stylesheet" href="css-img/css/navbar.css">
    <link rel="stylesheet" href="css-img/css/footer.css">
    <link rel="stylesheet" href="css-img/css/home.css">
    <link rel="stylesheet" href="css-img/css/bar.css">
    
    <link rel="stylesheet" href="css-bootstrap/bootstrap.css"> <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css-img/css/home.css">
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
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#categories">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a> <!-- html page -->
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
      <button class="btn_option last_btn"><div class="option"><img src="pictures/user.png" class="user_icon"><span class="option-text"><a href="loginPart/log&signup.html">Sign up</a></span></div></button>
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
      <div class="cart-content">
      </div>
      <div class="cart-footer">
      <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">0.00DH</div>
      </div>
      <button type="button" class="btn-buy">Proceed to pay</button>
    </div>
    <!--close cart-->
    <div class="close">
      <i class="fa-solid fa-xmark fa-2xl" id="close-cart"></i>
    </div>
  </div>
  
  <script src="js-bootstrap/bootstrap.js"></script>
  <script src="main.js"></script>





  <!-- video -->

  <div class="banner" id="home">
    <video src="css-img/pictures/pexels-max-fischer-5889074-3840x2160-25fps.mp4" autoplay muted loop type="mp4"></video>
    <!--the white shap below the Man -->
    <svg
      viewBox="0 0 200 200"
      xmlns="http://www.w3.org/2000/svg"
      class="banner_before"
    >
      <path
        fill="#FFFFFF"
        d="M30.8,-52.8C39,-48.6,44.3,-38.6,52.9,-28.8C61.5,-19,73.5,-9.5,76.8,1.9C80.2,13.4,74.8,26.7,66.1,36.2C57.3,45.7,45.1,51.4,33.5,56.5C21.9,61.7,11,66.5,0.9,64.9C-9.1,63.3,-18.3,55.4,-30.6,50.6C-42.9,45.8,-58.3,44.2,-66,36.3C-73.7,28.4,-73.6,14.2,-73.9,-0.2C-74.2,-14.5,-74.9,-29.1,-69,-40.1C-63.1,-51.2,-50.7,-58.7,-38.1,-60.4C-25.5,-62.2,-12.8,-58.1,-0.7,-56.8C11.3,-55.5,22.6,-57,30.8,-52.8Z"
        transform="translate(100 100)"
      />
    </svg>
    <!--the global paragraph with titles -->
    <div class="textBox">
      <h2>The Best You Can Wear</h2><br>
      <p>
        Welcome to our online clothing store!<br> We offer a wide selection of quality clothing for men and women, ranging from the latest fashion trends to timeless classics. We also pride ourselves on providing excellent customer service and being committed to environmental sustainability. Find your favorite clothing items among our selection of superior quality products.
      </p>
      <!--looks like buttons :) -->
      <a href="#page_about_us">About Us</a>
      <a href="login.html" id="hideInPhone">Shop Now! </a>
    </div>
    <!--the Man above the white shap-->
    <div class="imgBox">
      <img src="css-img/pictures/man.png" alt="" />
    </div>
    
  </div> 



  <!-- search -->
  <div class="search-wrapper">
      <h1>&#x2726; Clothes as you wish &#x2726;</h1> <!-- &#x2728; -->
      <input type="text" id="search-bar" placeholder="search for a shirt"/> 
      <ul id="clothesList"></ul>
  </div>

  <script src="search.js"></script>



    <section class="categories" id="categories">

      <div class="first-stack">

        <div class="container-cercle">
          <img src="https://images.pexels.com/photos/10857809/pexels-photo-10857809.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="t-shirts" class="cercle">
          <div class="text-btn">
            <button class="explore"><a href="category_pages_html/t-shirts.php">Explore</a></button>
            <div class="type-desc">
              <h1>T-shirts</h1> 
              <h3>as you'd like them</h3>
            </div>  
          </div>
        </div>
        
        <div class="container-cercle">
          <img src="https://images.pexels.com/photos/69212/pexels-photo-69212.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="chemise" class="cercle">
          <div class="text-btn">
            <button class="explore"><a id="button-downs" href="category_pages_html/button-downs.php">Explore</a></button>
            <div class="type-desc">
              <h1>Button-downs</h1> 
              <h3>with style</h3>
            </div>
          </div>
        </div>

        <div class="container-cercle">
            <img src="https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=600" alt="sweat-shirt" class="cercle">
            <div class="text-btn">
              <button class="explore"><a id="sweat-shirts" href="category_pages_html/sweat-shirts.php">Explore</a></button>
              <div class="type-desc">
                <h1>Sweat-shirts</h1> 
                <h3>crave</h3>
          </div>
            </div>
        </div>
      </div>

      <div class="second-stack">

        <div class="container-cercle">
          <img src="https://bcmpics.s3.amazonaws.com/48091.jpg" alt="long-sleeve" class="cercle">
          <div class="text-btn">
            <button class="explore"><a id="long-sleeves" href="category_pages_html/long-sleeves.php">Explore</a></button>
            <div class="type-desc">
              <h1>Long-sleeves</h1> 
              <h3>and nothing better</h3>
            </div>
          </div>
        </div>

        <div class="container-cercle">
          <img src="https://images.pexels.com/photos/9956300/pexels-photo-9956300.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="custom" class="cercle">
          <div class="text-btn">
            <button class="explore"><a id="jerseys" href="category_pages_html/jerseys.php">Explore</a></button>
            <div class="type-desc">
              <h1>Jerseys</h1> 
              <h3>loosen up your shots</h3>
            </div>
          </div>
          
        </div>

        <div class="container-cercle">
          <img src="https://images.pexels.com/photos/13009437/pexels-photo-13009437.jpeg" alt="accessories" class="cercle">
          <div class="text-btn">
            <button class="explore"><a id="accessories" href="category_pages_html/accessories.php">Explore</a></button>
            <div class="type-desc">
              <h1>Accesories</h1> 
              <h3>with great flavor</h3>
            </div>
          </div>
        </div>

      </div>

      <div class="custom-product-category">
          <img src="https://static.wixstatic.com/media/84770f_b5b78cd83b6342199b7370a2ba6b9e06.jpg/v1/fill/w_1899,h_751,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/84770f_b5b78cd83b6342199b7370a2ba6b9e06.jpg" alt="custom" class="cercle">
          <div class="text-btn">
            <button class="explore"><a id="iihm" href="category_pages_html/iihm.php">Explore</a></button>
            <div class="type-desc">
              <h1>IIHM</h1> 
              <h3>our own quality product</h3>
            </div>
          </div>
          
        </div>

    </section>  

      <!-- Site footer -->
      <footer class="site-footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>shipping details</h6>
            <p class="text-justify">shopping info Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum dignissimos aliquid, tempora totam unde enim quos! Fugiat et recusandae, ex impedit dolor delectus! Repellat, debitis.</p>
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
</body>
</html>