
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
                            <h2 style="color:blanchedalmond">THÔNG TIN TÀI KHOẢN KHÁCH HÀNG</h2>
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
                    <h1>THÔNG TIN CÁ NHÂN</h1>
                    <div>
                        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "db_pet";
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Lỗi Kết nối: " . $conn->connect_error);
          }
          $id = $_SESSION['user_id'];
          $sql = "SELECT user_id,username,name,address, email,phone,created_at FROM users WHERE user_id = $id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<table border=5 height=10 align=10 cellpadding=10>  
                <ul>
                <tr><th> Tài khoản &nbsp</th>       <td> ' . $row["username"] . ' </td></tr>
                <tr><th> Họ tên &nbsp</th>          <td> ' . $row["name"] . ' </td></tr>
                <tr><th> Địa chỉ &nbsp</th>         <td> ' . $row["address"] . ' </td></tr>
                <tr><th> Email &nbsp</th>           <td> ' . $row["email"] . ' </td></tr>
                <tr><th> Số điện thoại &nbsp</th>   <td>  ' . $row["phone"] . ' </td><tr>
                <tr><th> Thời gian tạo</th>         <td> ' . $row["created_at"] . '</td></tr>
                </ul>
                </table>';
              echo '
              <table>  
                    <ul>
                        <tr>
                            <td>
                            <a href="edit.php?id=' . $row["user_id"] . '; ?>"><button>Chỉnh sửa</button></a>
                            </td>

                            <td>
                            <a href="re_pass.php?id=' . $row["user_id"] . '"><button>Đổi mật khẩu</button></a>              
                            </td>

                            <td>
                            <a href="delete.php?id=' . $row["user_id"] . '"><button>Xóa tài khoản</button></a><br>
                            </td>

                            <td>
                            <a href="index.php?id=' . $row["user_id"] . '"><button>Về Trang Chủ</button></a><br>
                            </td>
                        </tr>
                    </ul>
                </table>';}
          } else {
            echo "0 results";
          }
          ?>
                        </div>
                    </div>
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
