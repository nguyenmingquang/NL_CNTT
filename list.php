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
                            <h2 style="color:green">DANH SÁCH SẢN PHẨM</h2>
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

    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-fadeInLeft">
                        <?php
                        $ketnoi = mysqli_connect('localhost', 'root', '', 'db_pet');
                        if (isset($_GET["search"]) && !empty($_GET["search"])) {
                            $key = $_GET["search"];
                            $sql = "SELECT * FROM sanpham WHERE id LIKE '%$key%' OR tensp LIKE '%$key%' OR hinhsp LIKE '%$key%'
                        OR cost LIKE '%$key%' OR soluong LIKE '%$key%' OR daban LIKE '%$key%' OR iddm LIKE '%$key%' ";
                        } else {
                            $sql = "select * from sanpham";
                        }
                        $result = mysqli_query($ketnoi, $sql);

                        ?>
                        <div class="title-all text-center">
                            <h1>Danh sách sản phẩm</h1>
                            <table class="search-form">
                                <tr>
                                    <td>
                                        <form action="" method="get">
                                            <input type="text" name="search" placeholder="Nhập sản phẩm cần tìm" value="<?php if (isset($_GET["search"])) {
                                                echo $_GET["search"];
                                            } ?>">
                                            <input type="submit" value="Tìm">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <table cellspacing="5" cellpadding="5" width="100%" height="100%" border="10"
                                argin="center">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hình Ảnh Sản Phẩm</th>
                                    <th>Đơn Giá</th>
                                    <th>Số Lượng Ban Đầu</th>
                                    <th>Tồn Kho</th>
                                    <th>Danh Mục Sản Phẩm</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['tensp']; ?></td>
                                        <td><?php echo '<img src="./img/' . $row['hinhsp'] . '" alt="" width="40%" leght="40%">'; ?></td>
                                        <td><?php echo $row['cost']; ?></td>
                                        <td><?php echo $row['soluong']; ?></td>
                                        <td><?php echo $row['daban']; ?></td>
                                        <td><?php echo $row['iddm']; ?></td>
                                        <td><a href="dele_product.php?id=<?php echo $row['id']; ?>"
                                                onClick="return confirm('Bạn muốn xóa sản phẩm này?');">Xóa</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                            mysqli_close($ketnoi);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="admin.php"><button>ADMIN_PAGE</button></a>&emsp;
        <a href="addproduct.php"><button>THÊM SẢN PHẨM</button></a>&emsp;
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