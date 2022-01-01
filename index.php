<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <style>
    input.button {
    border: 0;
    background: unset;
    color: unset;
}
</style>
    <body>
        <?php
        include "config/function.php";
    include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
    $search 	= postIndex("search");

    ?>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        knt@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +079-669-6969
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="my-account.php" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="login.php" class="dropdown-item">Login</a>
                                    <a href="register.php" class="dropdown-item">Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                       
                                <div class="navbar-nav ml-auto">
                                <?php 
                                if (isset($_SESSION['email']) && $_SESSION['email']){
                                    ?><a class="nav-item nav-link"> Xin chào <?php echo $_SESSION['email']."<br/>";?> </a>
                                    <a href="logout.php" class="nav-link" >Logout</a><?php
                                }
                                else{
                                    include "drop.php";
                                }?>
                            </div>                      
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                        <div align="center">
                            <form action="product-list.php?mod=search&proname=<?php echo $search;?>" method="post">
                                <input type="text" name="search" >
                                <button><i class="fa fa-search" type="submit" name="ok"></i></button>
                            </form>
                        </div>
                        </div>
                        <?php
                        if (isset($_POST['ok'])) 
                        {
                            if (empty($search)) {
                                echo "Yeu cau nhap du lieu vao o trong";
                            } 
                            else{
                                include "mod.php";
                            }
                        }

                        ?>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            
                            <a id="cartinfo"><?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']);?></a>
                            <a href="cart.php" class="btn cart" id="cart-box">
                                <i class="fa fa-shopping-cart"></i>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=bestselling"><i class="fa fa-thumbs-up"></i>Sản phẩm bán chạy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new"><i class="fa fa-plus-square"></i>Sản phẩm mới</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new&loai=ca"><i class="fas fa-fish"></i>Cá, tép cảnh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new&loai=den"><i class="fas fa-lightbulb"></i>Đèn thủy sinh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new&loai=cay"><i class="fa fa-seedling"></i>Cây thủy sinh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new&loai=ms"><i class="fa fa-sun"></i>Máy sủi oxi, bơm, máy sưởi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product-list.php?mod=new&loai=pn"><i class="fa fa-cubes"></i>Máy lọc, vật liệu lọc</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/fishtank1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>KnT giúp không gian xanh của riêng bạn trở nên sinh động hơn</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/ft2.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Sản phẩm đa dạng, Chất lượng tuyệt đối  </p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/ft6.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Nhiều sự kiện tri ân khách hàng!</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/ft3.jpg" />
                                <a class="img-text" href="">
                                    <p>Miễn phí giao hàng cho đơn hàng trên 800k</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="img/ft4.jpg" />
                                <a class="img-text" href="">
                                    <p>Nhiều ưu đãi hấp dẫn khác! </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/logo1.png" alt=""></div>
                    <div class="brand-item"><img src="img/logo2.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/logo3.jpg" alt=""></div>
                    <div class="brand-item"><img src="img/logo4.png" alt=""></div>
                    <div class="brand-item"><img src="img/logo5.png" alt=""></div>
                    <div class="brand-item"><img src="img/logo6.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Thanh toán an toàn</h2>
                            <p>
                                Đảm bảo sự an toàn khi khách hàng thanh toán online
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Giao hàng an toàn, nhanh chóng</h2>
                            <p>
                                Đảm bảo chất lượng sản phẩm và tốc độ giao hàng nhanh chóng
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>Đổi trả sản phẩm</h2>
                            <p>
                                Quý khách có thể đổi trả sản phẩm là đồ vật trong vòng 60 ngày nếu sản phẩm có vấn đề
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Tư vấn khách hàng</h2>
                            <p>
                                Cửa hàng luôn tư vấn khách hàng với thái độ nhiệt tình và thân thiện nhất
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/fishtank1.jpg" />
                            <a class="category-name" href="">
                                <p>KnT</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/ft2.jpg" />
                            <a class="category-name" href="">
                                <p>Không gian xanh của riêng bạn</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/ft3.jpg" />
                            <a class="category-name" href="">
                                <p>Chất lượng hàng đầu</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/ft4.jpg" />
                            <a class="category-name" href="">
                                <p>Dành những điều tốt nhất cho môi trường thủy sinh của bạn</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/ft6.jpg" />
                            <a class="category-name" href="">
                                <p>Đến với KnT</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/ft5.jpg" />
                            <a class="category-name" href="">
                                <p>Để có cho riêng mình môi trường thủy sinh xịn nhất</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Liên hệ với KnT ngay</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+0796696969 <i class='fas fa-phone' style='font-size:24px'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản phẩm được ưa chuộng</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php include "feature.php";?>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Nhận thông báo mới nhất từ cửa hàng</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Nhập Email của bạn">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản phẩm mới </h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php include "recent.php";
                    ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 Huỳnh Tấn Phát, Phú Xuân,Huyện Nhà Bè</p>
                                <p><i class="fa fa-envelope"></i>knt@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+079-669-6969</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
