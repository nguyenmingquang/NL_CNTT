<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QSHOP</title>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Tổng đài:<a href="#"> +1800 0000 </a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="dangnhap.php">
                                    <?php
                                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                                        echo '
                            <div>
                            <ul>
                                <li><a href="dangnhap.php">Đăng nhập</a></li>
                            </ul>
                            </div>';
                                    } else {
                                        echo '
                            <div>
                                <ul>
                                    <li><p>Xin chào, ' . htmlspecialchars($_SESSION["username"]) . '</p>
                                <div>
                                    <ul>';
                                        if ($_SESSION["user_type"] == 2) {
                                            echo '<li class="u-nav-item"><a href="admin.php">Admin Page</a></li>';
                                        } else {
                                            echo '<li><a href="infomation.php">Thông tin tài khoản</a></li>';
                                        }
                                        echo '
                                            <li><a href="dangxuat.php">Đăng xuất</a>
                                            </li>
                                        </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>';
                                    }
                                    ?>
                            </li>
                            <li><a href="contact-us.php"><i class="fas fa-headset"></i> Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm 20% Thức ăn cho Hoàng Thượng nhân ngày thành
                                    lập
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Tưng bừng khai trương chào mừng khuyến mãi lớn
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Ưu đãi đặc biệt khi mua các sản phẩm tại QSHOP
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> KHAI TRƯƠNG VÀO NGÀY 07/07/2023 🎉🎉🎉
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm giá đồng loạt 10% - 15% khi mua đồ chơi cho
                                    Boss
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Đăng ký ngay để nhận nhiều ưu đãi hấp dẫn
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
            
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Giới Thiệu</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Sản Phẩm</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Giỏ Hàng</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="img/home1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> QSHOP</strong></h1>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="img/home2.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> QSHOP</strong></h1>

                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="img/home3.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> QSHOP</strong></h1>

                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản phẩm nổi bật của chúng tôi</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".cats">Cats</button>
                            <button data-filter=".dogs">Dogs</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/2.jpg" class="img-fluid" alt="Image">
                         
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/14.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/19.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/6.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/12.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/4.jpg" class="img-fluid" alt="Image">

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/20.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/9.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/17.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/8.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 special-grid dogs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/15.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid cats">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="img/3.jpg" class="img-fluid" alt="Image">
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

    <div class="box-add-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <img src="img/ftl/x1.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <img src="img/ftl/x2.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme" height="400" weight="400">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/a.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/b.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/c.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/d.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/e.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/f.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="img/ftl/g.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Giờ Mở Cửa</h3>
                            <ul class="list-time">
                                <li>Thứ 2 - Thứ 6: 08.00am -> 05.00pm</li>
                                <li>Thứ 7: 10.00am -> 08.00pm</li>
                                <li>Chủ Nhật: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Mạng xã hội</h3>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer-copyright">
                    <p class="footer-company">Đăng ký bản quyền &copy; 2023 <a href="#">QSHOP</a> Thiết kế bởi
                        QUANG_B1910435</p>
                </div>
                <hr>
                <hr>
            </div>
    </footer>


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>