<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) unset($_SESSION['giohang']);

if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
$tensp = $hinhsp = $gia = $soluong = $thanhtien = $idbill = "";
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $tensp = trim($_POST['tensp']);
    $hinhsp = trim($_POST['hinhsp']);
    $cost = trim($_POST['cost']);
    $soluong = trim($_POST['soluong']);

    if (empty($name_err) && empty($phone_err) && empty($email_err) && empty($note_err)) {

        $sql = "INSERT INTO cart (tensp,hinhsp,gia,soluong,thanhtien,idbill) VALUES (:tensp,:hinhsp,:gia,:soluong,:thanhtien,:idbill)";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":tensp", $tensp, PDO::PARAM_STR);
            $stmt->bindParam(":hinhsp", $hinhsp, PDO::PARAM_STR);
            $stmt->bindParam(":gia", $gia, PDO::PARAM_STR);
            $stmt->bindParam(":soluong", $soluong, PDO::PARAM_STR);
            $stmt->bindParam(":thanhtien", $thanhtien, PDO::PARAM_STR);
            $stmt->bindParam(":idbill", $idbill, PDO::PARAM_STR);

            $status = "<h1 style='color:red' > thành công</h1>";
            if ($stmt->execute()) {
                echo '<p>' . $status . '</p>';
            } else {
                echo "Vui lòng thử lại";
            }
            unset($stmt);
        }
    }
    unset($pdo);

    $fl = 0;
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {

        if ($_SESSION['giohang'][$i][0] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;
        }
    }
    if ($fl == 0) {
        $sp = [$tensp, $hinhsp, $cost, $soluong];
        $_SESSION['giohang'][] = $sp;
    }
}

function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        if (sizeof($_SESSION['giohang']) > 0) {
            $tong = 0;
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $t = ($_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3]);
                $tt = sprintf('%.3f', $t);
                $tong += $tt;
                $tong = sprintf('%.3f', $tong);
                echo '<tr>
                            <td>' . $_SESSION['giohang'][$i][0] . '</td>
                            <td><img src="img/' . $_SESSION['giohang'][$i][1] . '" witdh="100px" height="120px" alt=""></td>
                            <td>' . $_SESSION['giohang'][$i][2] . '</td>
                            <td>' . $_SESSION['giohang'][$i][3] . '</td>
                            <td>
                                <div>' . $tt . '</div>
                            </td>
                            <td>
                               <a href="cart.php?delid=' . $i . '">Xóa</a>

                            </td>
                        </tr>';
            }
            echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>' . $tong . '</div>
                        </th>
    
                    </tr>';
        }
    }
}
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
                                    <i class="fab fa-opencart"></i> Giảm 20% Thức ăn cho Hoàng Thượng nhân ngày thành lập
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
                                    <i class="fab fa-opencart"></i> Giảm giá đồng loạt 10% - 15% khi mua đồ chơi cho Boss
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
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
                    <h2>GIỎ HÀNG</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                        <li class="breadcrumb-item active"><a href="cart.php">Giỏ Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pet";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error" . $conn->connect_error);
    }
    $id = $_SESSION['user_id'];
    $sql = "SELECT user_id, username, name, phone, address FROM users WHERE user_id = $id";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <form action="bill.php" method="post">
                   <div class="row col-md-12" >
                    <h1 style="color:red">THÔNG TIN NHẬN HÀNG</h1>
                    <table>
                    <ul>
                    <tr>
                            <td width="20%">Tài khoản</td>
                            <td><input type="text" name="username" value="' . $row['username'] . '" required></td>
                        </tr>
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="name" value="' . $row['name'] . '" required></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" value="' . $row['address'] . '" required></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="phone" value="' . $row['phone'] . '"required></td>
                        </tr>
                        </ul>
                        <tr>
                       <td>Phương thức thanh toán</td>
                        <td><label for="pttt">Chọn phương thức:</label>
                        <select name="pttt">
                         <option value="Thanh toán qua thẻ">Thanh toán qua thẻ</option>
                         <option value="Thanh toán khi nhận hàng">Thanh toán trực tiếp</option>
                        </select></td>
                        </tr>
                       
                    </table>
    </form>
';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Tên sản phẩm</th>
                                    <th>Hình</th>
                                    <th>Đơn giá(VND)</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền(VND)</th>
                                    <th>Xóa</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php showgiohang(); ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="d-flex shopping-box">
                    <a href="shop.php" class="ml-auto btn hvr-hover">ĐẶT THÊM SẢN PHẨM</a>
                    <a href="cart.php?delcart=1" class="ml-auto btn hvr-hover">XÓA GIỎ HÀNG</a>
                    <input type="submit" class="btn btn-primary ml-auto btn hvr-hover" name="dathang" value="ĐẶT HÀNG">
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