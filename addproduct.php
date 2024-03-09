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
                            <h2 style="color:red">THÊM SẢN PHẨM</h2>
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
    <?php
require_once "config.php";
$tensp = $hinhsp = $cost = $soluong = $daban = $iddm = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["tensp"])) {
        $tensp = $_POST['tensp'];
    }
    if (isset($_POST["hinhsp"])) {
        $hinhsp = $_POST['hinhsp'];
    }
    if (isset($_POST["cost"])) {
        $cost = $_POST['cost'];
    }
    if (isset($_POST["soluong"])) {
        $soluong = $_POST['soluong'];
    }
    if (isset($_POST["daban"])) {
        $daban = $_POST['daban'];
    }
    if (isset($_POST["iddm"])) {
        $iddm = $_POST['iddm'];
    }
    $sql = "INSERT INTO sanpham (tensp, hinhsp, cost, soluong, daban, iddm)
    VALUES (:tensp, :hinhsp, :cost, :soluong, :daban, :iddm)";
    
    if ($a = $pdo->prepare($sql)) {
        $a->bindParam(":tensp", $tensp, PDO::PARAM_STR);
        $a->bindParam(":hinhsp", $hinhsp, PDO::PARAM_STR);
        $a->bindParam(":cost", $cost, PDO::PARAM_STR);
        $a->bindParam(":soluong", $soluong, PDO::PARAM_STR);
        $a->bindParam(":daban", $daban, PDO::PARAM_STR);
        $a->bindParam(":iddm", $iddm, PDO::PARAM_STR);
        if ($a->execute()) {
            header("location: list.php");
        } else {
            echo "Vui lòng thử lại";
        }
        unset($a);
    }
    unset($pdo);
}
?>
<?php
session_start()
?>    

    <div class="boxcenter">
        <div class="container">
            <table>
                <h1 class="text-center title-all"><b>THÊM SẢN PHẨM</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="tensp" class="form-control " value="<?php echo $tensp; ?>">

                    </div>
                    <div class="form-group">
                        <label>Hình ảnh sản phẩm</label>
                        <input type="file" name="hinhsp" class="form-control " value="<?php echo $hinhsp; ?>">

                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="cost" class="form-control " value="<?php echo $cost; ?>">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="text" name="soluong" class="form-control" value="<?php echo $soluong; ?>">
                    </div>
                    <div class="form-group">
                        <label>Số lượng đã bán</label>
                        <input type="text" name="daban" class="form-control" value="<?php echo $daban; ?>">
                    </div>
                    <div class="form-group">
                        <label>Danh Mục Sản Phẩm</label>
                        <input type="text" name="iddm" class="form-control" value="<?php echo $iddm; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit">Thêm sản phẩm</button>
                    </div>
                </form>
            </table>
        </div>
    </div>

    <div>
        <a href="admin.php"><button>ADMIN_PAGE</button></a>&emsp;
        <a href="list.php"><button>XEM DANH SÁCH SẢN PHẨM</button></a>&emsp;
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