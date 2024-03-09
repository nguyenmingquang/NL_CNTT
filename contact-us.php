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
                            <li><a href="dangnhap.php"><i class="fa fa-user s_color"></i> My Account</a></li>
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

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
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

    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>LIÊN HỆ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                        <li class="breadcrumb-item active"><a href="contact-us.php">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
require_once "config.php";
$name = $phone = $email = $note = "";
$name_err = $phone_err = $email_err = $note_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["name"]))) {
        $name_err = "Điền họ và tên của bạn.";
    } elseif (strlen(trim($_POST["name"])) < 3) {
        $name_err = "Họ và tên phải trên 3 ký tự";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Điền số điện thoại của bạn.";
    } elseif (strlen(trim($_POST["phone"])) < 10) {
        $phone_err = "Số điện thoại phải có 10 số.";
    } else {
        $phone = trim($_POST["phone"]);
    }
    if (empty(trim($_POST["email"]))) {
        $email_err = "Điền địa chỉ email của bạn.";
    } elseif (strlen(trim($_POST["email"])) < 3) {
        $email_err = "Họ và tên phải trên 3 ký tự";
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty(trim($_POST["note"]))) {
        $note_err = "Nhập nội cần giải đáp của bạn.";
    } elseif (strlen(trim($_POST["note"])) < 3) {
        $note_err = "Nội dung phải trên 3 ký tự";
    } else {
        $note = trim($_POST["note"]);
    }

    if (empty($name_err) && empty($phone_err) && empty($email_err) && empty($note_err)) {

        $sql = "INSERT INTO lienhe (name,phone,email,note) VALUES (:name, :phone, :email, :note)";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":note", $param_note, PDO::PARAM_STR);
            $param_name = $name;
            $param_phone = $phone;
            $param_email = $email;
            $param_note = $note;
            $status = "<h1 style='color:red' >Gửi Phản Hồi thành công</h1>";
            if ($stmt->execute()) {
                echo '<p>'. $status .'</p>';
            } else {
                echo "Vui lòng thử lại";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>LIÊN HỆ</h2>
                        <table>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="name" name="name" placeholder="Họ và Tên" required
                                                data-error="Vui lòng nhập Tên"
                                                class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $name; ?>">
                                            <span class="invalid-feedback">
                                                <?php echo $name_err; ?>
                                            </span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" required
                                                data-error="Vui lòng nhập Email"
                                                class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $email; ?>">
                                            <span class="invalid-feedback">
                                                <?php echo $email_err; ?>
                                            </span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="phone" name="phone" placeholder="Số Điện Thoại" required
                                                data-error="Vui lòng nhập SĐT"
                                                class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $phone; ?>">
                                            <span class="invalid-feedback">
                                                <?php echo $phone_err; ?>
                                            </span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea type="note" name="note" placeholder="Nội dung phản hồi" rows="4"
                                                data-error="Vui lòng nhập vào phản hồi của bạn"
                                                class="form-control <?php echo (!empty($note_err)) ? 'is-invalid' : ''; ?>"
                                                value="<?php echo $note; ?>" required></textarea>
                                            <span class="invalid-feedback">
                                                <?php echo $note_err; ?>
                                            </span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group submit-button text-center">
                                            <input type="submit" class="btn btn-primary" id="submit" value="Gửi">
                                            
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>THÔNG TIN LIÊN HỆ</h2>
                        <p><b>Nếu có bất cứ phản hồi, yêu cầu hay khiếu nại về Shop vui lòng liên hệ với QSHOP.</p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i><b>Address: 
                                    <b>Khu II, Đ. 3/2, <br><b>P.Xuân Khánh,
                                            Q.Ninh Kiều, TP.Cần Thơ</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i><b>Phone: <b>0123456789</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i><b>Email: <b>QSHOP@gmail.com</a></p>
                            </li>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12461.771587322604!2d105.76114301677524!3d10.030521275261993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e1!3m2!1svi!2s!4v1677702497571!5m2!1svi!2s"
                                width="300" height="300" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
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


    <!-- Start Footer  -->
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