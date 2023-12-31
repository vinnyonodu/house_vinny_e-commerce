<?php 
session_start();
require_once "includes/dbconnection.php";


$mobile_devices_sql = "SELECT * FROM `items` WHERE `item_category_id` = 1";
$result = mysqli_query($conn, $mobile_devices_sql); 

if(isset($_SESSION['id'])) {
    $user_session = $_SESSION['id']; //to store the session id in a $user_session variable
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


    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

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
                                    <img src="assets/images/logo/vinny2 (1).jpg" alt="website logo">
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
                <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo for mobile devices - menu screen"></a>
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
                <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo for mobile devices - menu screen"></a>
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



    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">x</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-golden">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Shop - Mobile Phones</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index-3.php">Home</a></li>
                                    <li><a class="active" aria-current="page">&nbsp; >Shop</a></li>
                                    <li class="active" aria-current="page">Mobile Phones</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                            <div class="row">
                                                <?php while($row = mysqli_fetch_assoc($result)) {?>
                                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden"
                                                            data-aos="fade-up" data-aos-delay="0">
                                                            <div class="image-box">
                                                                <a href="product.php?id=<?php echo $row['id']?>" class="image-link">
                                                                    <img src="assets/images/product/default/home-3/<?php echo $row['image_one']?>"
                                                                        alt="<?php echo $row['alt_text']?>">
                                                                    <img src="assets/images/product/default/home-3/<?php echo $row['image_two']?>"
                                                                        alt="<?php echo $row['alt_text_two']?>">
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
                                                    </div>
                                                <?php  }?> 
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->
                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a>2</a></li>
                            <li><a>3</a></li>
                            <li><a><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div> <!-- End Shop Product Sorting Section  -->
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->
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

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>


    <!-- JS Files -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


</html>