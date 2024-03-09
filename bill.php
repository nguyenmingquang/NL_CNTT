<?php
    session_start();
    require_once "config.php";
    include "function.php";
    if(isset($_POST['dathang'])&&($_POST['dathang'])){
        $username=$_POST['username'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $total=tongdonhang();
        $pttt=$_POST['pttt'];

        $idbill=taodonhang($username,$name,$address,$phone,$total,$pttt);

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            $tensp=$_SESSION['giohang'][$i][1];
            $hinhsp=$_SESSION['giohang'][$i][0];
            $gia=$_SESSION['giohang'][$i][2];
            $soluong=$_SESSION['giohang'][$i][3];
            $thanhtien=$gia*$soluong;
            taogiohang($tensp,$hinhsp,$gia,$soluong,$thanhtien,$idbill);
        }

        $ttkh=
        '
        <h1 style=color:red>Mã đơn hàng: '.$idbill.'</h1>
                <h2>THÔNG TIN NHẬN HÀNG</h2>
                <table class="thongtinnhanhang" border=5 height=10 align=10 cellpadding=10>
                <ul>
                <tr><td width="20%">Tài khoản</td> <td>'.$username.'</td></tr>
                <tr><td width="20%">Họ tên</td>    <td>'.$name.'</td></tr>
                <tr><td>Địa chỉ</td>               <td>'.$address.'</td></tr>
                <tr><td>Điện thoại</td>            <td>'.$phone.'</td></tr>
                <tr><td>Phương thức thanh toán</td><td>'.$pttt.'</td> </tr>
            </ul>
            </table>';
            $ttgh=showbill();  
        unset($_SESSION['giohang']);
        
    }  
?> <!DOCTYPE html>
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
                            <h2 style="color:blanchedalmond">ĐƠN HÀNG</h2>
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

    <div class="products-box mr" id="bill">
    <div class="container">
        <div class="row">
                
                <div class="col-lg-12">
                    <div class="row">
                       </div> 
                    <div class="table-main table-responsive">
                    <div>  <?php echo $ttkh; ?> </div>
                    <div class="row" >
                </div>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Tên sản phẩm</th>
                                    <th>Hình</th>
                                    <th>Đơn giá(VND)</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền(VND)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody><tr><?php echo $ttgh; ?></tr></tbody>
                        </table>
                        <div>
                        <a href="index.php"><button style="color:blue">Về Trang Chủ</button></a>
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
    