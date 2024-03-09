<?php
session_start()
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
                            <h2 style="color:blanchedalmond">CHỈNH SỬA TÀI KHOẢN</h2>
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

    <div class="products-box">
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-fadeInLeft">
                    <h1>CHỈNH SỬA TÀI KHOẢN</h1>
                    <div>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "db_pet";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $id = $_SESSION['user_id'];
                        $query = "SELECT * from users where user_id='" . $id . "'";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($mysql));
                        $row = mysqli_fetch_assoc($result);
                        ?>

                        <?php
                        $status = "";
                        if (isset($_POST['new']) && $_POST['new'] == 1) {
                            
                            $id = $_REQUEST['user_id'];
                            $username = $_REQUEST['username'];
                            $name = $_REQUEST['name'];
                            $address = $_REQUEST['address'];
                            $email = $_REQUEST['email'];
                            $phone = $_REQUEST['phone'];

                            $update = "update users set 
                            username='" . $username . "',name='" . $name . "',address='" . $address . "',email='" . $email . "' ,phone='" . $phone . "' where user_id='" . $id . "'";
                            mysqli_query($conn, $update) or die(mysqli_error($mysql));
                            $status = "<h1 style='color:red'>Cập nhật thành công</h1> </br></br>
                            <a href='infomation.php'><button>Xem lại trang cá nhân</button></a>";
                            echo '<p style="color:#FF0000;">' . $status . '</p>';
                        } else {
                        ?>
                            <div class="col-lg-6">
                                <form name="form" method="post" action="">
                                    <input type="hidden" name="new" value="1" />
                                    <input name="user_id" type="hidden" value="<?php echo $row['user_id']; ?>" />
                                    <p><input type="text" name="username" placeholder="Nhập tên tài khoản của bạn" required value="<?php echo $row['username']; ?>" /></p>
                                    <p><input type="text" name="name" placeholder="Nhập tên của bạn" required value="<?php echo $row['name']; ?>" /></p>
                                    <p><input type="text" name="address" placeholder="Nhập địa chỉ của bạn" required value="<?php echo $row['address']; ?>" /></p>
                                    <p><input type="text" name="email" placeholder="Nhập email của bạn" required value="<?php echo $row['email']; ?>" /></p>
                                    <p><input type="text" name="phone" placeholder="Nhập SĐT cần chỉnh sửa" required value="<?php echo $row['phone']; ?>" /></p>
                                    <p><input name="submit" type="submit" value="Lưu thay đổi" /></p>
                                </form>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
            </div>
       </div>
    </div>  
    
    </body>
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Giờ Mở Cửa</h3>
							<ul class="list-time">
								<li>Thứ 2 - Thứ 6: 08.00am -> 05.00pm</li> <li>Thứ 7: 10.00am -> 08.00pm</li> <li>Chủ Nhật: <span>Closed</span></li>
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
                    <p class="footer-company">Đăng ký bản quyền  &copy; 2023 <a href="#">QSHOP</a> Thiết kế bởi QUANG_B1910435</p>
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
    