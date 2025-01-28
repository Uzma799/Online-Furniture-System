<?php
require("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width>, initial-scale=1.0">
    <title>Shop Now</title>
    <link rel="stylesheet" href="/website/shop.css">
    <link  rel="stylesheet" href="/website/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>

    <!-- Popular Section -->
    <section class="popular-container" id="popular">
        <div class="heading">
            <?php
            $count=0;
            if(isset($_SESSION['cart']))
            {
                $count=count($_SESSION['cart']);
            }
            ?>
            <h2>Popular</h2><div class="container-fluid justify-content-end">
            <a href="/website/index.php" class="btn" type="button">Home</a>
            <a href="/website/cart.php" class="btn">My Cart (<?php echo $count; ?>)</a>
        </div>
        </div>
        <div class="popular-content">
            <!--Box-->
            <?php   
          $query="SELECT * FROM `products`";
          $result=mysqli_query($con,$query);
          $i=1;
          $fetch_src=FETCH_SRC;

          while($fetch=mysqli_fetch_assoc($result))
          {
            echo<<<product
            <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="$fetch_src$fetch[image]">
                <div class="box-text">
                    <div class="title-price">
                        <h3>$fetch[name]</h3>
                        <span>$$fetch[price]</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="$fetch[name]">
                    <input type="hidden" name="price" value="$fetch[price]">
                </div>
                </div>
            </form>
            product;
            $i++;
          }
          ?>
        </div>
    </section>

    <!--Product Section-->
    <section class="product-container" id="products">
        <div class="heading">
            <h2>Our Products</h2>
        </div>
        <div class="products-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/product1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Mordern White Bed</h3>
                        <span>$750</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Mordern White Bed">
                    <input type="hidden" name="price" value="750">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/singlebeds.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Twin Beds With Slide</h3>
                    <span>$650</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Twin Beds With Slide">
                <input type="hidden" name="price" value="650">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Divano Sofa Set</h3>
                    <span>$400</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Divano Sofa Set">
                <input type="hidden" name="price" value="400">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Pink Study Set</h3>
                    <span>$200</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Pink Study Set">
                <input type="hidden" name="price" value="200">
            </div>
        </div>
    </form>
        <!--Box 5-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product5.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Classic Bed</h3>
                    <span>$450</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Classic Bed">
                <input type="hidden" name="price" value="450">
            </div>
        </div>
    </form>
        <!--Box 6-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product6.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Leather Sectional Sofa</h3>
                    <span>$350</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Leather Sectional Sofa">
                <input type="hidden" name="price" value="350">
            </div>
        </div>
    </form>
        <!--Box 7-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product7.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Violet Armchair</h3>
                    <span>$150</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Violet Armchair">
                <input type="hidden" name="price" value="150">
            </div>
        </div>
    </form>
        <!--Box 8-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/product8.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Mordern Lounge Sofa</h3>
                    <span>$400</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Mordern Lounge Sofa">
                <input type="hidden" name="price" value="400">
            </div>
        </div>
    </form>
    </div>
    </section>

    <!--Gallery-->
    <!-- Bedroom -->
    <section class="bedroom-container" id="bedroom">
        <div class="heading">
            <h2>Bed Room</h2>
        </div>
        <div class="bedroom-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/bed1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>High Quality Double Bed</h3>
                        <span>$1000</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="High Quality Double Bed">
                    <input type="hidden" name="price" value="1000">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/bed2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Triple Twin Bunk Bed</h3>
                    <span>$450</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Triple Twin Bunk Bed">
                <input type="hidden" name="price" value="450">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/bed3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Single Bed With Storage</h3>
                    <span>$300</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Single Bed With Storage">
                <input type="hidden" name="price" value="300">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/bed4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Classic Brown Bed</h3>
                    <span>$700</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Classic Brown Bed">
                <input type="hidden" name="price" value="700">
            </div>
        </div>
    </form>
        </div>
    </section>

    <!-- Living Room -->
    <section class="living-container" id="living">
        <div class="heading">
            <h2>Living Room</h2>
        </div>
        <div class="living-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/living1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Italian Design Wooden Set</h3>
                        <span>$950</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Italian Design Wooden Set">
                    <input type="hidden" name="price" value="950">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/living2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Black Mordern Living Set</h3>
                    <span>$900</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Black Mordern Living Set">
                <input type="hidden" name="price" value="900">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/living3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>White Soft Sofa Set</h3>
                    <span>$650</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "White Soft Sofa Set">
                <input type="hidden" name="price" value="650">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/living4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Off White Sofa Set</h3>
                    <span>$600</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Off White Sofa Set">
                <input type="hidden" name="price" value="600">
            </div>
        </div>
    </form>
        </div>
    </section>

    <!-- OutDoors -->
    <section class="outdoors-container" id="outdoors">
        <div class="heading">
            <h2>Outdoors</h2>
        </div>
        <div class="outdoors-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/outdoor1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Outdoor Chair-Sofa Set</h3>
                        <span>$300</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Outdoor Chair-Sofa Set">
                    <input type="hidden" name="price" value="300">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/outdoor2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Outdoor Pool Set</h3>
                    <span>$950</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Outdoor Pool Set">
                <input type="hidden" name="price" value="950">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/outdoor3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Garden Dining Set</h3>
                    <span>$550</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Garden Dining Set">
                <input type="hidden" name="price" value="550">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/outdoor4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Round Umbrella Sofa</h3>
                    <span>$500</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Round Umbrella Sofa">
                <input type="hidden" name="price" value="500">
            </div>
        </div>
    </form>
        </div>
    </section>

    <!-- Kitchen -->
    <section class="kitchen-container" id="kitchen">
        <div class="heading">
            <h2>Kitchen & Dining</h2>
        </div>
        <div class="kitchen-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/kitchen1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Purple Modular Kitchen</h3>
                        <span>$1750</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Purple Modular Kitchen">
                    <input type="hidden" name="price" value="1750">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/kitchen2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>High Class Modern Kitchen</h3>
                    <span>$2500</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="High Class Modern Kitchen">
                <input type="hidden" name="price" value="2500">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/kitchen3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Green Modular Kitchen Cabinets</h3>
                    <span>$1800</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Green Modular Kitchen Cabinets">
                <input type="hidden" name="price" value="1800">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/kitchen4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Dark Morden Kitchen</h3>
                    <span>$2700</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Dark Morden Kitchen">
                <input type="hidden" name="price" value="2700">
            </div>
        </div>
    </form>
        </div>
    </section>

    <!-- Lamps & Ligtings -->
    <section class="lamp-container" id="lamp">
        <div class="heading">
            <h2>Lamps & Lightings</h2>
        </div>
        <div class="lamp-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/lamp1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Simple Table Lamp</h3>
                        <span>$100</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Simple Table Lamp">
                    <input type="hidden" name="price" value="100">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/lamp2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Enchanted Lunar Lamps</h3>
                    <span>$250</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Enchanted Lunar Lamps">
                <input type="hidden" name="price" value="250">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/lamp3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Ring Ceiling Lightings</h3>
                    <span>$300</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Ring Ceiling Lightings">
                <input type="hidden" name="price" value="300">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/lamp4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Aesthetic Black Bulbs</h3>
                    <span>$120</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Aesthetic Black Bulbs">
                <input type="hidden" name="price" value="120">
            </div>
        </div>
    </form>
        </div>
    </section>

        <!-- Furnishing -->
        <section class="furnishing-container" id="furnishing">
        <div class="heading">
            <h2>Furnishings</h2>
        </div>
        <div class="furnishing-content">
            <!--Box 1-->
        <form action="/website/manage_cart.php" method="post">
            <div class="box">
                <img src="/website/images/table1.jpg" alt="">
                <div class="box-text">
                    <div class="title-price">
                        <h3>Mordern Wood Table</h3>
                        <span>$250</span>
                    </div>
                    <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                    <input type="hidden" name="item_name" value="Mordern Wood Table">
                    <input type="hidden" name="price" value="250">
                </div>
            </div>
        </form>
        <!--Box 2-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/table2.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Traditional Coffee Table</h3>
                    <span>$400</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Traditional Coffee Table">
                <input type="hidden" name="price" value="400">
            </div>
        </div>
    </form>
        <!--Box 3-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/table3.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Royal Dining Set</h3>
                    <span>$570</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value= "Royal Dining Set">
                <input type="hidden" name="price" value="570">
            </div>
        </div>
    </form>
        <!--Box 4-->
    <form action="/website/manage_cart.php" method="post">
        <div class="box">
            <img src="/website/images/table4.jpg" alt="">
            <div class="box-text">
                <div class="title-price">
                    <h3>Classic Dining Table</h3>
                    <span>$400</span>
                </div>
                <a><button type="submit" name="cart_btn" class='bx bx-cart' ></button></a>
                <input type="hidden" name="item_name" value="Classic Dining Table">
                <input type="hidden" name="price" value="400">
            </div>
        </div>
    </form>
        </div>
    </section>

    <!-- Footer -->
    <section class="footer">
        <div class="footer-box">
            <h3>The Company</h3>
            <a href="http://localhost/website/index.php"><i class='bx bx-chevron-right'>Home</i></a>
            <a href="http://localhost/website/aboutus.html"><i class='bx bx-chevron-right'>About Us</i></a>
            <a href="http://localhost/website/gallery.html"><i class='bx bx-chevron-right'>Gallery</i></a>
            <a href="http://localhost/website/shop.php"><i class='bx bx-chevron-right'>Shop</i></a>
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
</body>
</html>