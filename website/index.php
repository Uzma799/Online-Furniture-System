<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Website</title>
    <link  rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <nav>
          <div class="main">
            <div class="logo">
                <img src="/website/images/logo1.png">
            </div>
            <div>
            <ul>
                <li><a href="http://localhost/website/index.php">Home</a></li>
                <li><a href="http://localhost/website/gallery.html">Gallery</a></li>
                <li><a href="http://localhost/website/aboutus.html">About</a></li>
                <li><a href="http://localhost/website/contactus.php">Contact</a></li>
                <li><?php
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
                    {
                        echo"<div class='user'>$_SESSION[user_id] - <a href='logout.php'>Log Out</a></div>";
                    }
                    else{
                        echo"<a href='http://localhost/website/reg-form.php'>Login</a>";
                    }
                ?></li>
            </ul>
            </div>
          </div>
        </nav>
        <div class="icons">
        <a href="/website/cart.php"><i class='bx bxs-cart-add'></i></a>
        </div>
        <div class="title">
            <h1><b>Kia Furniture Works</b></h1>
            <h2>We Design Your Dreams</h2><br><br>
        </div>
        <div class="button">
            <a href="http://localhost/website/shop.php/" class="btn">Shop Now</a>
        </div>
    </header><br>

    <!-- Services -->
    <section class="services">
        <div class="box">
            <img src="/website/images/freedelivery.png">
            <h3>Free Delivery</h3>
            <p>We Provide Free Delivery As a Gift For You</p>
        </div>
        <div class="box">
            <img src="/website/images/securepayments.png">
            <h3>Secure Payments</h3>
            <p>Secure Online And Offline Payments</p>
        </div>
        <div class="box">
            <img src="/website/images/support.png">
            <h3>24/7 Support</h3>
            <p>24/7 Consultancy and Guidance for Customers</p>
        </div>
    </section><br>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-box">
            <h3>The Company</h3>
            <a href="http://localhost/website/index.php"><i class='bx bx-chevron-right'>Home</i></a>
            <a href="http://localhost/website/aboutus.html"><i class='bx bx-chevron-right'>About Us</i></a>
            <a href="http://localhost/website/gallery.html"><i class='bx bx-chevron-right'>Gallery</i></a>
            <a href="http://localhost/website/shop.php/"><i class='bx bx-chevron-right'>Shop</i></a>
            <a href="http://localhost/website/contactus.php"><i class='bx bx-chevron-right'>Contact Us</i></a>
        </div>
        <div class="footer-box">
            <h3>Popular Categories</h3>
            <a href="/website/shop.php/#bedroom"><i class='bx bx-chevron-right'>Bed Room</i></a>
            <a href="/website/shop.php/#living"><i class='bx bx-chevron-right'>Living Room</i></a>
            <a href="/website/shop.php/#outdoors"><i class='bx bx-chevron-right'>Outdoor</i></a>
            <a href="/website/shop.php/#kitchen"><i class='bx bx-chevron-right'>Kitchen & Dining</i></a>
            <a href="/website/shop.php/#lamp"><i class='bx bx-chevron-right'>Lamps & Lightings</i></a>
            <a href="/website/shop.php/#furnishing"><i class='bx bx-chevron-right'>Furnishings</i></a>
        </div>
        <div class="footer-box">
            <h3>Contact Info</h3>
            <a href="#"><i class='bx bxs-phone'> +111-222-3333</i></a>
            <a href="#"><i class='bx bxs-phone'> +123-456-7890</i></a>
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><i class='bx bxs-envelope'> uzmashaikh799@gmail.com</i></a>
            <a href="https://www.google.com/maps/place/Mumbai+-+Pune+Expy,+Padgha,+Navi+Mumbai,+Maharashtra+410208"><i class='bx bxs-map'> Mumbai, India - 410208</i></a>
        </div>
        <div class="footer-box">
            <h3>Social Media Links</h3>
            <div class="social">
            <a href="https://www.facebook.com/profile.php?id"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/uzmashaikh_79"><i class='bx bxl-instagram-alt'></i></a>
            <a href="#"><i class='bx bxl-google'></i></a>
            </div>
        </div>
    </section>

    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      echo"<h2 style='text-align: center;'> We're Glad To See You $_SESSION[user_id]</h2>";
    }
    ?>
    
</body>
</html>