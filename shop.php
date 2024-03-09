
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
                            <li><a href="dangnhap.php"><i class="fa fa-user s_color">
                                    </i> My Account</a></li>
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

    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                </div>
                                
                           
                                    
                                </div>
                                <div class="col-12 col-sm-4 text-center text-sm-right">
                                    <ul class="nav nav-tabs ml-auto">
                                        <li>
                                            <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>                                              
                            <div class="product-categorie-box">
                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                        <div class="row">
                                            <?php
                                            $conn = mysqli_connect('localhost', 'root', '', 'db_pet');
                                            $sql = "SELECT * FROM sanpham";
                                            $result = mysqli_query($conn, $sql);
                                            ?>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
       
                    
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <form action="cart.php" method="post">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="./img/' . $row['hinhsp'] . '"  class="img-fluid" alt="Image"></div>
                                <div class="mask-icon">
                                    <a class="cart"> <input type="submit" name="addcart" value="Thêm vào giỏ hàng"></a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>' . $row['tensp'] . '    <input type="number" name="soluong" min="1" max="100" value="1"></h4>
                                
                                <h5><span>' . $row['cost'] . '</span> VNĐ</h5>
                            </div>
                           
                            <input type="hidden" name="tensp" value="' . $row['tensp'] . '">
                            <input type="hidden" name="cost" value="' . $row['cost'] . '">
                            <input type="hidden" name="hinhsp" value="' . $row['hinhsp'] . '">
                    </form>
            
        </div>';
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            $conn->close();
                                            ?>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="list-view">
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="new">Mới</p>
                                                            </div>
                                                            <img src="img/2.jpg" class="img-fluid" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>Mèo Anh Mắt Xanh</h4>
                                                        <h5> <del></del>5.000</h5>
                                                        <p>Trong nhóm các giống mèo cảnh lông dài, lông xù thì mèo Anh  – mèo Ald luôn là giống mèo được yêu thích nhất với ngoại hình xinh xắn, bộ lông dài sang chảnh và tính cách thân thiện phù hợp với mọi gia đình.
                                                            <br>Tuổi: 1
                                                            <br>Độ yêu thích: ❤❤❤❤❤ 
                                                        </p>
                                                        
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Giảm Giá</p>
                                                            </div>
                                                            <img src="img/14.jpg" class="img-fluid" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>Chó Anh Lông Trắng</h4>
                                                        <h5> <del>10.000</del>9.000</h5>
                                                        <p>Chó lông xù trắng có bộ lông trắng muốt, đáng yêu như một cục bông gòn, nên chúng còn được gọi là chó bông hay chó bông gòn. Chó bông xù trắng có kích thước to hay nhỏ thì điều xinh xắn, đáng yêu. Cùng VuiPet tìm hiểu các giống chó bông trắng đẹp, được nuôi phổ biến nhất hiện nay nhé. 
                                                            <br>Tuổi: 1,5
                                                            <br>Độ yêu thích: ❤❤❤❤ 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Mới</p>
                                                            </div>
                                                            <img src="img/19.jpg" class="img-fluid" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>Chó Cáo Sa Mạc</h4>
                                                        <h5> <del></del>11.000</h5>
                                                        <p>Hay còn gọi là chó tuyết trắng đến từ Siberia, Nga. Lớp lông siêu dài, dày của giống chó lông xù trắng này được sinh ra để phù hợp với thời tiết lạnh giá, khắc nghiệt.Ở Việt Nam, với khí hậu nóng ẩm, để chó có thể phát triển khỏe mạnh và xinh đẹp cần điều kiện chăm sóc rất cao bao gồm có không gian sống mát mẻ, có máy lạnh, chế độ ăn uống tốt và cần được chải lông, spa thường xuyên. Chính vì thế, bên cạnh giá tương đối cao thì chi phí để nuôi cần tốn khá nhiều. 
                                                            <br>Tuổi: 2
                                                            <br>Độ yêu thích: ❤❤❤❤ 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="new">Mới</p>
                                                            </div>
                                                            <img src="img/6.jpg" class="img-fluid" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>Mèo Nga Thuần Chủng</h4>
                                                        <h5> <del></del>6.500</h5>
                                                        <p>Mèo Nga Russian hay còn gọi là mèo Nga vàng là giống mèo quý tộc cực quý hiếm trên thế giới. Chính vẻ ngoài quý tộc duyên dáng nhưng rắn chắc, cơ bắp và đôi mắt màu xanh lục bảo tuyệt đẹp đã khiến nhiều bạn mê mệt giống mèo này
                                                            <br>Tuổi: 2
                                                            <br>Độ yêu thích: ❤❤❤ 
                                                        </p>
                                                        
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Giảm Giá</p>
                                                            </div>
                                                            <img src="img/15.jpg" class="img-fluid" alt="Image">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>Chó Shiba Inu</h4>
                                                        <h5> <del>15.000</del>114.300</h5>
                                                        <p>Chó Shiba là giống có kích thước nhỏ như một con mèo, thân hình thon gọn và có những biểu cảm cực kì đáng yêu. Đây là giống chó rất được yêu thích và được lựa chọn là thú cưng nuôi tại nhiều gia đình.
                                                            <br>Tuổi: 2
                                                            <br>Độ yêu thích: ❤❤❤❤❤ 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

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