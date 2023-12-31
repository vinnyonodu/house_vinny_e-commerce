<?php 
session_start();
require_once "includes/dbconnection.php"; // including a connection to the db

$allitems_sql = "SELECT * FROM `items`";
$result = mysqli_query($conn, $allitems_sql);

$best_seller_sql = "SELECT * FROM `items` WHERE `best_Seller` = 1";
$best_seller_result = mysqli_query($conn, $best_seller_sql); 

if(isset($_SESSION['id'])) {
$user_session = $_SESSION['id'];
$user_cart_items_sql = "SELECT items.* FROM `items` WHERE `id` IN (SELECT cart.item_id FROM cart WHERE cart.user_id = '$user_session')";
$user_cart_items_result = mysqli_query($conn, $user_cart_items_sql);

$user_cart_items_quantity_sql = "SELECT SUM(cart.quantity) FROM cart WHERE cart.user_id = '$user_session'";
$user_cart_items_quantity_result = mysqli_query($conn, $user_cart_items_quantity_sql);
$user_cart_items_quantity_row = mysqli_fetch_assoc($user_cart_items_quantity_result);

}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="e-commerce">
    <meta name="Keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Vincent Onodu">

    <title>HOUSE VINNY</title>

    <link rel="shortcut icon" href="assets/images/logo/vinny2 (1).jpg" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="index-3.php">
                                        <img src="assets/images/logo/vinny2 (1).jpg" alt="website logo on the header">
                                    </a>
                                </div>
                                <div style="color: white; font-weight: bold;">
                                    HOUSE VINNY
                                </div>
                            </div>
                          
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--white menu-hover-color--pink">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="index-3.php">Home</a>
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="#">Shop <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Shop</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="shop-all-items.php">All Items</a></li>
                                                            <li><a href="shop-mobile-phones.php">Mobile Phones</a></li>
                                                            <li><a href="shop-laptops.php">Laptops</a></li>
                                                            <li><a href="shop-sound-devices.php">Sound Devices</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="blog-full-width.php">Blog</a>
                                        </li>
                                        <li>
                                            <a href="faq.php">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="about-us.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact-us.php">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="user-orders.php">My Orders</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#"><i class="icon-user"></i><i class="fa fa-angle-down"></i><i>&nbsp;<span style="color: red;">
                                                <?php 
                                                if(isset($_SESSION["first_name"])){
                                                    echo "Hi"." " . $_SESSION["first_name"] . "!";
                                                } 
                                                else {
                                                    echo "";
                                                }?></span></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                            <?php if(isset($_SESSION['id'])) { echo "";} else {?>
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="register.php">Register</a></li>
                                            <?php }?>
                                                <?php if(isset($_SESSION['id'])) {?>
                                                <li><a><form action="includes/logoutformhandler.php"><button>Logout</button></form></a></li>
                                                <?php } else { echo "";} ?>
                                            </ul>
                                        </li> 
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--white action-hover-color--pink">
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <?php if(isset($_SESSION['id'])) { ?>
                                    <span class="item-count"><?php echo $user_cart_items_quantity_row['SUM(cart.quantity)']?></span>
                                    <?php } else {?>
                                    <span class="item-count"></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

   <!-- Start Mobile Header -->
<div class="mobile-header  mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="index-3.php">
                                <div class="logo">
                                    <img src="assets/images/logo/vinny2 (1).jpg" alt="website logo for mobile view">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->
                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--white action-hover-color--pink">
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <?php if(isset($_SESSION['id'])) {?>
                                <span class="item-count"><?php echo $user_cart_items_quantity_row['SUM(cart.quantity)']?></span>
                                <?php } else { ?>
                                    <span class="item-count"></span>
                                    <?php } ?>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas"
                                class="offcanvas-toggle offside-menu offside-menu-color--black">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="index-3.php"><span style="color: red;">
                                                <?php 
                                                if(isset($_SESSION["first_name"])){
                                                    echo "Hi"." " . $_SESSION["first_name"] . "!";
                                                } 
                                                else {
                                                    echo "";
                                                }?></span>
                        </a>
                    </li>
                    <li>
                        <a href="index-3.php">Home</a>
                    </li>
                    <li>
                        <a href="user-orders.php">My Orders</a>
                    </li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            <li><a href="shop-all-items.php">All Items</a></li>
                                <li><a href="shop-mobile-phones.php">Mobile Phones</a></li>
                                <li><a href="shop-laptops.php">Laptops</a></li>
                                <li><a href="shop-sound-devices.php">Sound Devices</a></li>
                        </ul>
                     </li>
                    <li>
                        <a href="blog-full-width.php"><span>Blogs</span></a>
                    </li>
                    <li>
                        <a href="faq.php">FAQs</a>
                    </li>
                    <li>
                        <a href="about-us.php">About Us</a>
                    </li>
                    <li>
                        <a href="contact-us.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="#"><span>Account</span></a>
                        <ul class="mobile-sub-menu">
                        <?php if(isset($_SESSION['id'])) { echo "";} else {?>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                            <?php }?>
                                <?php if(isset($_SESSION['id'])) {?>
                                <li><a href="login.php">Logout</a></li>
                                <?php } else { echo "";} ?>
                        </ul>
                    </li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo on mobile devices(menu screen)"></a>
            </div>

            <address class="address">
                <p><i class="icon-home"></i>   Millenium Point, curzon street, Birmingham</p>
                <p><i class="icon-phone"></i>  +44 (0) 1234 5678 9</p>
                <p><i class="icon-envelope"></i>    housevinnygadgets@yopmail.com</p>
                
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- Start Offcanvas Mobile Menu Section -->
        <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-right">
                <button class="offcanvas-close"><i class="ion-android-close"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo on mobile devices(menu screen)"></a>
                </div>
                <address class="address">
                    <p><i class="icon-home"></i>   Millenium Point, curzon street, Birmingham</p>
                    <p><i class="icon-phone"></i>  +44 (0) 1234 5678 9</p>
                    <p><i class="icon-envelope"></i>    housevinnygadgets@yopmail.com</p>  
                </address>
                <ul class="social-link">
                    <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

   <!-- Start Offcanvas Addcart Section -->
   <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Shopping Cart</h4>
        <ul class="offcanvas-cart">
            <?php if(isset($_SESSION["id"])) {?>
                <?php $total = 0;?>
                <?php while($user_cart_items_row = mysqli_fetch_assoc($user_cart_items_result)) {?>                               
                    <li class="offcanvas-cart-item-single">
                        <div class="offcanvas-cart-item-block">
                            <a href="#" class="offcanvas-cart-item-image-link">
                                <img src="assets/images/product/default/home-3/<?php echo $user_cart_items_row['image_one']?>" alt="item one on the cart screen"
                                    class="offcanvas-cart-image">
                            </a>
                            <div class="offcanvas-cart-item-content">
                                <a href="#" class="offcanvas-cart-item-link"><?php echo $user_cart_items_row['title']; ?></a>
                                <div class="offcanvas-cart-item-details">
                                    <?php
                                    $row_id = $user_cart_items_row['id'];
                                    $user_cart_one_item_quantity_sql = "SELECT quantity FROM cart WHERE cart.user_id = '$user_session' and cart.item_id = $row_id";
                                    $user_cart_one_item_quantity_result = mysqli_query($conn, $user_cart_one_item_quantity_sql);
                                    $user_cart_one_item_quantity_row = mysqli_fetch_assoc($user_cart_one_item_quantity_result);
                                     
                                    ?>
                                    <span class="offcanvas-cart-item-details-quantity"><?php echo $user_cart_one_item_quantity_row['quantity']?> x </span>
                                    <?php if($user_cart_items_row['discount_price'] != 0) {?>
                                    <span class="offcanvas-cart-item-details-price">&pound;<?php echo $user_cart_items_row['discount_price']?>.00</span>
                                    <?php $item_subtotal = $user_cart_one_item_quantity_row['quantity'] * $user_cart_items_row['discount_price']?>
                                    <?php } else { ?>
                                    <span class="offcanvas-cart-item-details-price">&pound;<?php echo $user_cart_items_row['price']?>.00</span>
                                    <?php $item_subtotal = $user_cart_one_item_quantity_row['quantity'] * $user_cart_items_row['price']?>
                                    <?php }
                                    $total = $total + $item_subtotal;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="offcanvas-cart-item-delete text-right">
                            <a href="includes/cartdeletehandler.php?id=<?php echo $user_cart_items_row['id']?>" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </li>
                <?php } } else { echo ""; }?>
        </ul>
        <?php if(isset($_SESSION['id'])) { ?>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">&pound;<?php echo $total ?>.00</span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li><a href="cart.php" class="btn btn-block btn-golden">View Cart</a></li>
            <li><a href="checkout.php" class=" btn btn-block btn-golden mt-5">Checkout</a></li>
        </ul>
        <?php } else {  ?>
            <a href="login.php"><strong><span>Login to view your cart, click here</span></strong><a>
            <?php }?>
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div> <!-- End  Offcanvas Addcart Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <?php 
                        $dashboard_sql_1 = "SELECT * FROM `banner_images` WHERE `item_id` = 8";
                        $dashboard_sql_2 = "SELECT * FROM `banner_images` WHERE `item_id` = 9";
                        $dashboard_result_1 = mysqli_query($conn, $dashboard_sql_1);
                        $dashboard_result_2 = mysqli_query($conn, $dashboard_sql_2);
                        $dashboard_row_1 = mysqli_fetch_assoc($dashboard_result_1);
                        $dashboard_row_2 = mysqli_fetch_assoc($dashboard_result_2);
                    ?>
                    <div class="hero-slider-bg">
                        <img src="assets/images/hero-slider/home-3/<?php echo $dashboard_row_1['image']?>" alt="first welcome screen dashboard product">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h1 class="title"><?php echo $dashboard_row_1['item_text']?> <br> <?php echo $dashboard_row_1['item_text_2']?> <br> <?php echo $dashboard_row_1['item_text_3']?></h1>
                                        <a href="product.php?id=<?php echo $dashboard_row_1['item_id']?>" class="btn btn-lg btn-pink">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="assets/images/hero-slider/home-3/<?php echo $dashboard_row_2['image']?>" alt="Second welcome screen dashboard product">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h1 class="title"><?php echo $dashboard_row_2['item_text']?> <br>  <?php echo $dashboard_row_2['item_text_2']?></h1>
                                        <a href="product.php?id=<?php echo $dashboard_row_2['item_id']?>" class="btn btn-lg btn-pink">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-pink"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->
    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-5.png" alt="free shipping">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>House Vinny provides a 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-6.png" alt="money back">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed with shopping with House Vinny, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-7.png" alt="safe payment">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>House Vinny offers secure payment utilising the world's most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-8.png" alt="loyaty customer">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back when you shop with House Vinny.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">the New arrivals</h3>
                                <p>New amazing gadgets are available in the House Vinny store, shop now!</p>
                                <p style="color: brown; font-style: italic;">House Vinny Tip: Click Item To View Product</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <div class="product-default-single-item product-color--pink swiper-slide">
                                        <div class="image-box">
                                        <a href="product.php?id=<?php echo $row['id']?>" class="image-link">
                                            <img src="assets/images/product/default/home-3/<?php echo $row['image_one']?>" alt="<?php echo $row['alt_text']?>">
                                            <img src="assets/images/product/default/home-3/<?php echo $row['image_two']?>" alt="<?php echo $row['alt_text_two']?>">
                                        </a>
                                        <?php if($row['discount_price'] != 0) {?>
                                           <div class="tag">
                                                <span>sale</span>
                                            </div>
                                            <?php } ?>
                                            <div class="action-link">
                                                <div class="action-link-left">
                                                </div>
                                            </div>
                                    </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="product.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></h6>
                                                <?php if($row['rating'] == 0) {?>
                                                <ul class="review-star">
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php } else if($row['rating'] == 1) { ?>
                                                    <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php } else if($row['rating'] == 2) { ?>
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php } else if($row['rating'] == 3) { ?>
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php } else if($row['rating'] == 4) { ?>
                                                    <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php } else  { ?>
                                                    <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <?php }?>
                                            </div>
                                            <div class="content-right">
                                                <?php if($row['discount_price'] != 0) {?>
                                                <span class="price"><del>&pound;<?php echo $row['price']?>.00</del>&pound;<?php echo $row['discount_price'];?>.00</span>
                                                <?php } else { ?>
                                                <span class="price">&pound;<?php echo $row['price']?>.00</span>
                                                <?php }?>
                                            </div> 
                                    </div>
                                 </div>
                                 <?php  }?>
                            </div>
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <?php 
            $banner_sql_1 = "SELECT * FROM `banner_images` WHERE `item_id` = 5";
            $banner_sql_2 = "SELECT * FROM `banner_images` WHERE `item_id` = 12";
            $banner_result_1 = mysqli_query($conn, $banner_sql_1);
            $banner_result_2 = mysqli_query($conn, $banner_sql_2);
            $banner_row_1 = mysqli_fetch_assoc($banner_result_1);
            $banner_row_2 = mysqli_fetch_assoc($banner_result_2);
            ?>
            <a href="product.php?id=<?php echo $banner_row_1['item_id']?>">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="assets/images/banner/<?php echo $banner_row_1['image']?>" alt="item 1 banner">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <a href="product.php?id=<?php echo $banner_row_2['item_id']?>">
                <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="image">
                        <img class="img-fluid" src="assets/images/banner/<?php echo $banner_row_2['image']?>" alt="item 2 banner">
                    </div>
                </div>
            </a>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Introducing House Vinny's best sellers for this month...</p>
                                <p style="color: brown; font-style: italic;">House Vinny tip: Hover over items to add to cart</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <?php
                                        while($row_2 = mysqli_fetch_assoc($best_seller_result)) {?>
                                        <!-- Start Product Default Single Item -->
                                        <div class="product-default-single-item product-color--pink swiper-slide">
                                            <div class="image-box">
                                                <a href="product.php?id=<?php echo $row_2['id']?>" class="image-link">
                                                    <img src="assets/images/product/default/home-3/<?php echo $row_2['image_one']?>" alt="<?php echo $row_2['alt_text']?>">
                                                    <img src="assets/images/product/default/home-3/<?php echo $row_2['image_two']?>" alt="<?php echo $row_2['alt_text_two']?>">
                                                </a>
                                                <?php if($row_2['discount_price'] != 0) {?>
                                                <div class="tag">
                                                    <span>sale</span>
                                                </div>
                                                <?php } ?>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a href="product.php?id=<?php echo $row_2['id']?>"><?php echo $row_2['title']?></a></h6>
                                                    <?php if($row_2['rating'] == 0) {?>
                                                        <ul class="review-star">
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php } else if($row_2['rating'] == 1) { ?>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php } else if($row_2['rating'] == 2) { ?>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php } else if($row_2['rating'] == 3) { ?>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php } else if($row_2['rating'] == 4) { ?>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php } else  { ?>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    <?php }?>
                                                </div>
                                                <div class="content-right">
                                                    <?php if($row_2['discount_price'] != 0) {?>
                                                        <span class="price"><del>&pound;<?php echo $row_2['price']?>.00</del>&pound;<?php echo $row_2['discount_price'];?>.00</span>
                                                        <?php } else { ?>
                                                        <span class="price">&pound;<?php echo $row_2['price']?>.00</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Default Single Item -->
                                    <?php }?>
                                </div>
                                
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE LATEST BLOGS</h3>
                                <p>Latest articles developed and written to elaborate the current electronic and gadgets culture</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-default-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container blog-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a>
                                                <img class="img-fluid"
                                                    src="assets/images/blog/iPhone-15-Pro (1).jpg" alt="blog post 1">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a>Iphone 15, What To Expect</a>
                                            </h6>
                                            <p>Apple releases an update as regards the much anticipated multi colours for the 
                                                incoming Iphone 25 pro max, yet to be released on the 25th of December, 2023
                                            </p>
                                            <div class="inner">
                                                <div class="post-meta">
                                                    <a class="date">By - Vincent Onodu,   09 JULY 2023</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a >
                                                <img class="img-fluid"
                                                    src="assets/images/blog/samsung-galaxy-watch.jpg" alt="blog post 2">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a>The New Samsung Watch</a>
                                            </h6>
                                            <p>Samsung Galaxy Watch 46mm R800 Silver from Samsung is more than just a typical smartwatch, 
                                                it's a time piece. Choose from multiple elegant style watch faces. 
                                                </p>
                                            <div class="inner">
                                                <div class="post-meta">
                                                    <a class="date">By - Vincent Onodu,   09 JULY 2023</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a class="image-link">
                                                <img class="img-fluid"
                                                    src="assets/images/blog/macbook (1).jpg" alt="blog post 3">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a>M1 Chip Introduced</a></h6>
                                            <p>MacBook Air with M1 is an incredibly portable laptop — it's nimble and quick, with a silent, 
                                                fanless design and a beautiful Retina display. The M1 chip is definitely looking good
                                                </p>
                                            <div class="inner">
                                                <div class="post-meta">
                                                    <a class="date">By - Vincent Onodu,   08 JULY 2023</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a class="image-link">
                                                <img class="img-fluid"
                                                    src="assets/images/blog/applevr (1).jpg" alt="blog post 4">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a>The Look Of The Apple VR Device</a>
                                            </h6>
                                            <p>Apple lived up to months of expectations on Monday when it 
                                                introduced new high-tech goggles that blend the real world with virtual reality.</p>
                                            <div class="inner">
                                                <div class="post-meta">
                                                    <a class="date">By - Vincent Onodu,   07 JULY 2023</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Slider Section -->
    <!-- Start powered by Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <P class="section-title">POWERED BY</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-default-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container blog-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a>
                                                <img class="img-fluid"
                                                    src="assets/images/company-logo/BCU-logo.png" alt="powered by company - bcu logo">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <div class="blog-default-single-item blog-color--pink swiper-slide">
                                        <div class="image-box">
                                            <a >
                                                <img class="img-fluid"
                                                    src="assets/images/logo/vinny.jpg" alt="powered by company - house vinny logo">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Powered by Slider Section -->
 <!-- Start Footer Section -->
 <footer class="footer-section footer-bg section-top-gap-100">
    <div class="footer-wrapper">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <!-- Start Footer Single Item -->
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                            data-aos-delay="600">
                            <h5 class="title">HOUSE VINNY</h5>
                            <div class="footer-about">
                                <p>At House Vinny inc. We believe that quality gadgets present in every home 
                                    contributes greatly to the happiness of the home. We are building an ecosystem that will enable customers
                                and users walk in confidently with the mindset of purchasing an efficient and quality products.</p>
                            </div>
                        </div>
                        <!-- End Footer Single Item -->
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <!-- Start Footer Single Item -->
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                            data-aos-delay="400">
                            <h5 class="title">CONTACT US</h5>
                            <address class="address">
                                <p><i class="icon-home"></i>   Millenium Point, curzon street, Birmingham</p>
                                <p><i class="icon-phone"></i>  +44 (0) 1234 5678 9</p>
                                <p><i class="icon-envelope"></i>    housevinnygadgets@yopmail.com</p>
                                
                            </address>
                        </div>
                        <!-- End Footer Single Item -->
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-6">
                        <!-- Start Footer Single Item -->
                        <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up"
                            data-aos-delay="200">
                            <h5 class="title">QUICK LINKS</h5>
                            <ul class="footer-nav">
                                <li><a href="index-3.php">Home</a></li>
                                <li><a href="shop-laptops.php">Laptops</a></li>
                                <li><a href="shop-mobile-phones.php">Mobile Phones</a></li>
                                <li><a href="shop-sound-devices.php">Sound Devices</a></li>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="blog-full-width.php">Blogs</a></li>
                                <li><a href="faq.php">FAQs</a></li>
                            </ul>
                        </div>
                        <!-- End Footer Single Item -->
                    </div>
                    <div class="col-auto mb-6">
                        <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="title">FOLLOW US</h4>
                            <ul class="footer-social-link">
                                <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                    <div class="col-auto mb-6">
                        <div class="footer-payment">
                            <div class="image">
                                <img src="assets/images/company-logo/payment.png" alt="payment methods">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
    </div>
</footer>
<!-- End Footer Section -->
  <!-- Start Modal Add cart -->
<div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-8">
                                    <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                        successfully!</div>
                                    <div class="modal-add-cart-product-cart-buttons">
                                        <a href="cart.html">View Cart</a>
                                        <a href="checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 modal-border">
                            <ul class="modal-add-cart-product-shipping-info">
                                <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                        Cart.</strong></li>
                                <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                        SHOPPING</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Modal Add cart -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
   

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>



</html>