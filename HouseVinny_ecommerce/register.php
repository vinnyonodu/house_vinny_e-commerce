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


    <!-- CSS Files-->
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
                                        <a href="#"><i class="icon-user"></i>    <i class="fa fa-angle-down"></i></a>
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
                <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo on mobile devices - menu screen"></a>
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
                <a href="index-3.php"><img src="assets/images/logo/vinny2 (1).jpg" alt="website logo on mobile devices - menu screen"></a>
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
    
    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Register</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index-3.php">Home</a></li>
                                    <li class="active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Register</h3>
                        <?php if (isset($_GET['error'])) { ?>
                          <p style="color: red;"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <form action="includes/regformhandler.php" method="POST">
                            <div class="default-form-box">
                                <label>First Name <span style="color: red;">*</span></label>
                                <input type="text" name="first_name" required>
                            </div>
                            <div class="default-form-box">
                                <label>Last Name <span style="color: red;">*</span></label>
                                <input type="text" name="last_name" required>
                            </div>
                            <div class="default-form-box">
                                <label>Email address <span style="color: red;">*</span></label>
                                <input type="text" name="email_address" required>
                            </div>
                            <div class="default-form-box">
                                <label>Password <span style="color: red;">*</span></label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="default-form-box">
                                <label>Confirm Password <span style="color: red;">*</span></label>
                                <input type="password" name="confirm_password" required>
                            </div>
                            <div class="default-form-box">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number">
                            </div>
                            <div class="default-form-box">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

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