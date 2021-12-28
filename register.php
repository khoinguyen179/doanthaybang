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
      
      $sachDB=new Sach();
      
  ?>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
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
                            <a href="index.html" class="nav-item nav-link">Home</a>
                            <a href="product-list.html" class="nav-item nav-link">Products</a>
                            
                            <a href="cart.html" class="nav-item nav-link">Cart</a>
                            <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.html" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.html" class="dropdown-item active">Login & Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="login.html" class="dropdown-item">Login</a>
                                    <a href="register.html" class="dropdown-item">Register</a>
                                </div>
                            </div>
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
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    
                    <li class="breadcrumb-item active">Login & Register</li>
                </ul>
            </div>
        </div>
        
        <!-- Breadcrumb End -->
        
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">    
                        <div class="register-form">
                            <form action="register.php" method="POST">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label>Tên đăng nhập</label>
                                        <input class="form-control" type="text" name="txtUsername" placeholder="Tên đăng nhập:">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="txtEmail" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="text" name="txtSDT" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" type="text" name="txtdc" placeholder="Địa chỉ">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mật khẩu</label>
                                        <input class="form-control" type="text" name="txtPassword" placeholder="Mật khẩu">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nhập lại mật khẩu</label>
                                        <input class="form-control" type="text" name="txtrepassword" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn">Đăng ký</button>
                                        <button type="reset" class="btn">Nhập lại</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
 
 // Nếu không phải là sự kiện đăng ký thì không xử lý
 if (!isset($_POST['txtUsername'])){
     die('');
 }
  
 
       
 //Khai báo utf-8 để hiển thị được tiếng việt

       
 //Lấy dữ liệu từ file dangky.php
 $username   = addslashes($_POST['txtUsername']);
 $password   = addslashes($_POST['txtPassword']);
 $email      = addslashes($_POST['txtEmail']);
 $SDT   = addslashes($_POST['txtSDT']);
 $repass   = addslashes($_POST['txtrepassword']);
 $dc   = addslashes($_POST['txtdc']);
 
 //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
 if (!$username || !$password || !$email || !$repass || !$SDT || !$dc)
 {
     echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
       
     // Mã khóa mật khẩu
    $password = md5($password);
    $repass=md5($repass);
 //Kiểm tra tên đăng nhập này đã có người dùng chưa
 $kq=$db->exeQuery("select * from khachhang where tenkh= '$username' ");
 if ($kq != null){
     echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
       
 //Kiểm tra email có đúng định dạng hay không
 if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email))
 {
     echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
       
 //Kiểm tra email đã có người dùng chưa
 $kq1=$db->exeQuery("select * from khachhang where email= '$email' ");
 if ($kq1 != null)
 {
     echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
 //Kiểm tra dạng nhập vào của ngày sinh
 if ($repass != $password)
 {
         echo "Mật khẩu nhập lại không đúng. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
         exit;
     }
       $string_1="kh";
       $string_2=substr($username,3,6);
       $string=$string_1.$string_2;
 //Lưu thông tin thành viên vào bảng
 try{
    $pdh = new PDO("mysql:host=localhost; dbname=doanchuyennganh"  , "root"  , ""  );
    $pdh->query("  set names 'utf8'"  );
    }
    catch(Exception $e){
            echo $e->getMessage(); exit;
    }
 $sql="insert into khachhang(makh, email, matkhau, tenkh,diachi,dienthoai) values(:makh, :email, :matkhau, :tenkh,:diachi,:dienthoai) ";
				$arr = array(":makh"=>$string,":email"=>$email,":matkhau"=>$password,":tenkh"=>$username,":diachi"=>$dc,":dienthoai"=>$SDT);
				$stm= $pdh->prepare($sql);
				$stm->execute($arr);
				$n = $stm->rowCount();
				$message = "Thêm thành công";
                $error = "Lỗi thêm";
                if ($n>0) echo "<script type='text/javascript'>alert('$message');</script>";
                else echo  "<script type='text/javascript'>alert('$error');</script>";
            ?>
 

        <!-- Login End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
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
