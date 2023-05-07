<?php
session_start();
require_once './dbconnect.php';
require_once './assets/data/product_data.php';
require_once './assets/data/category_data.php';
require_once './assets/data/language_data.php';
require_once './assets/data/author_data.php';
?>
﻿<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BookStore</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">

        <!-- all css here -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\plugin.css">
        <link rel="stylesheet" href="assets\css\bundle.css">
        <link rel="stylesheet" href="assets\css\style.css">
        <link rel="stylesheet" href="assets\css\responsive.css">
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!-- Add your site or application content here -->

        <!--pos page start-->
        <div class="pos_page">
            <div class="container">
                <!--pos page inner-->
                <div class="pos_page_inner">
                    <!--header area -->
                    <div class="header_area">
                        <!--header top-->
                        <div class="header_top">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="header_links">
                                        <ul>
                                            <li><a href="wishlist.php" title="Yêu thích">Yêu thích</a></li>
                                            <?php
                                            if (isset($_SESSION['uname']) && $_SESSION['uname'] != "") {
                                                ?>
                                                <li><a href="account.php" title="<?php echo $_SESSION['uname'] ?>"><?php echo $_SESSION['uname'] ?></a></li>

                                            <?php } else {
                                                ?>
                                                <li><a href="" title="Tài khoản">Tài khoản</a></li>
                                            <?php } ?>
                                            <li><a href="cart.php" title="Giỏ hàng">Giỏ hàng</a></li>
                                            <?php
                                            if (isset($_SESSION['uname']) && $_SESSION['uname'] != "") {
                                                ?>
                                                <li><a href="">Đăng nhập</a></li>
                                            <?php } else { ?>
                                                <li><a href="login.php" title="Đăng nhập">Đăng nhập</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--header top end-->

                        <!--header middel-->
                        <div class="header_middel">
                            <div class="row align-items-center">
                                <!--logo start-->
                                <div class="col-lg-3 col-md-3">
                                    <div class="logo">
                                        <a href="index.php"><img src="assets/img/logo/logo.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!--logo end-->
                                <div class="col-lg-9 col-md-9">
                                    <div class="header_right_info">
                                        <div class="search_bar">
                                            <form action="products-search.php?action=search" method="post">
                                                <input placeholder="Tìm kiếm..." type="text" name="search">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                        <div class="shopping_cart">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                $total_quantity = 0;
                                                $total_price = 0;
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    $total_quantity += intval($value['quantity']);
                                                    $total_price += doubleval($value['price']) * intval($value['quantity']);
                                                }
                                                ?>
                                                <a href="cart.php"><i class="fa fa-shopping-cart"></i> <?php echo $total_quantity ?> sp - <?php echo $total_price ?> đ</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href=""><i class="fa fa-shopping-cart"></i>Giỏ hàng trống</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--header middel end-->
                        <div class="header_bottom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="main_menu_inner">
                                        <div class="main_menu d-none d-lg-block">
                                            <nav>
                                                <ul>
                                                    <li class="active"><a href="index.php">Trang chủ</a></li>
                                                    <li><a href="intro.php">Giới thiệu</a></li>
                                                    <?php
                                                    $category = new Theloai("", "");
                                                    $result = $category->showAllCategories($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Thể loại</a>
                                                            <div class="mega_menu jewelry">
                                                                <div class="mega_items jewelry">
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-category.php?action=category&id=<?php echo $row['tl_ma'] ?>"><?php echo $row['tl_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>

                                                    <?php
                                                    $language = new Ngonngu("", "");
                                                    $result = $language->showAllLanguages($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Ngôn ngữ</a>
                                                            <div class="mega_menu jewelry">
                                                                <div class="mega_items jewelry">
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-language.php?action=language&id=<?php echo $row['nn_ma'] ?>"><?php echo $row['nn_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>

                                                    <?php
                                                    $author = new Tacgia("", "");
                                                    $result = $author->showAllAuthors($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Tác giả</a>
                                                            <div class="mega_menu jewelry">
                                                                <div class="mega_items jewelry">
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-author.php?action=author&id=<?php echo $row['tg_ma'] ?>"><?php echo $row['tg_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                    <li><a href="feedback.php">Góp ý</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="mobile-menu d-lg-none">
                                            <nav>
                                                <ul>
                                                    <li><a href="index.php">Trang chủ</a></li>
                                                    <li><a href="intro.php">Giới thiệu</a></li>
                                                    <?php
                                                    $category = new Theloai("", "");
                                                    $result = $category->showAllCategories($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Thể loại</a>
                                                            <div>
                                                                <div>
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-category.php?action=category&id=<?php echo $row['tl_ma'] ?>"><?php echo $row['tl_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>

                                                    <?php
                                                    $language = new Ngonngu("", "");
                                                    $result = $language->showAllLanguages($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Ngôn ngữ</a>
                                                            <div>
                                                                <div>
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-language.php?action=language&id=<?php echo $row['nn_ma'] ?>"><?php echo $row['nn_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>

                                                    <?php
                                                    $author = new Tacgia("", "");
                                                    $result = $author->showAllAuthors($conn);
                                                    if ($result->num_rows > 0) {
                                                        ?>
                                                        <li><a href="products-all.php">Tác giả</a>
                                                            <div>
                                                                <div>
                                                                    <ul>
                                                                        <?php
                                                                        while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <li><a href="products-author.php?action=author&id=<?php echo $row['tg_ma'] ?>"><?php echo $row['tg_ten'] ?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                    <li><a href="feedback.php">Góp ý</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header end -->

                    <!--breadcrumbs area start-->
                    <div class="breadcrumbs_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb_content">
                                    <ul>
                                        <li><a href="index.php">Trang chủ</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li>Đăng nhập</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--breadcrumbs area end-->

                    <!-- customer login start -->
                    <div class="customer_login">
                        <div class="row">
                            <!--login area start-->
                            <div class="col-lg-6 col-md-6">
                                <div class="account_form">
                                    <h2>Đăng nhập</h2>
                                    <form action="" method="post">
                                        <p>
                                            <label>Tên đăng nhập <span>*</span></label>
                                            <input type="text" name="uname">
                                            <?php
                                            if (isset($_POST['login'])) {
                                                $uname = trim($_POST['uname']);
                                                if ($uname == "") {
                                                    ?>
                                                    <span>Vui lòng nhập tên đăng nhập.</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p>
                                            <label>Mật khẩu <span>*</span></label>
                                            <input type="password" name="pword">
                                            <?php
                                            if (isset($_POST['login'])) {
                                                $pword = trim($_POST['pword']);
                                                $check = ((isset($_POST['check']) != 0) ? 1 : "");
                                                if ($pword != "") {
                                                    $stmt = $conn->prepare("SELECT tknd_ma, tknd_tendangnhap FROM taikhoannguoidung WHERE tknd_tendangnhap = '$uname' and tknd_matkhau = '$pword'");
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $_SESSION['uid'] = $row['tknd_ma'];
                                                        $_SESSION['uname'] = $uname;
                                                        ?> 
                                                        <span>Đăng nhập thành công.</span>
                                                    <?php } else {
                                                        ?>
                                                        <span>Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng nhập lại.</span>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span>Vui lòng nhập mật khẩu.</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </p>
                                        <div class="login_submit">
                                            <button type="submit" name="login">Đăng nhập</button>
                                            <a href="forget-password-mail.php">Quên mật khẩu?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--login area end-->

                            <!--register area start-->
                            <div class="col-lg-6 col-md-6">
                                <div class="account_form register">
                                    <h2>Đăng ký</h2>
                                    <form action="" method="post">
                                        <p>
                                            <label>Tên đăng nhập <span>*</span></label>
                                            <input type="text" name="uname">
                                            <?php
                                            if (isset($_POST['register'])) {
                                                $uname = trim($_POST['uname']);
                                                if ($uname != "") {
                                                    $stmtname = $conn->prepare("SELECT tknd_tendangnhap FROM taikhoannguoidung WHERE tknd_tendangnhap = '$uname'");
                                                    $stmtname->execute();
                                                    $resultname = $stmtname->get_result();
                                                    if ($resultname->num_rows > 0) {
                                                        ?>
                                                        <span>Tên đăng nhập đã tồn tại. Vui lòng sử dụng tên đăng nhập khác.</span>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span>Vui lòng nhập tên đăng nhập.</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p>
                                            <label>Mật khẩu <span>*</span></label>
                                            <input type="password" name="pword">
                                            <?php
                                            if (isset($_POST['register'])) {
                                                $pword = trim($_POST['pword']);
                                                if ($pword == "") {
                                                    ?>
                                                    <span>Vui lòng nhập mật khẩu.</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p>
                                            <label>Email <span>*</span></label>
                                            <input type="email" name="mail">
                                            <?php
                                            if (isset($_POST['register'])) {
                                                $mail = trim($_POST['mail']);
                                                $phone = trim($_POST['phone']);
                                                $addr = trim($_POST['addr']);
                                                if ($mail != "") {
                                                    $stmtmail = $conn->prepare("SELECT tknd_email FROM taikhoannguoidung WHERE tknd_email = '$mail'");
                                                    $stmtmail->execute();
                                                    $resultmail = $stmtmail->get_result();
                                                    if ($resultmail->num_rows > 0) {
                                                        ?>
                                                        <span>Email đã tồn tại. Vui lòng sử dụng email khác.</span>
                                                        <?php
                                                    } else {
                                                        $sql = "INSERT INTO taikhoannguoidung (tknd_tendangnhap, tknd_matkhau, tknd_email, tknd_sodienthoai, tknd_diachi)"
                                                                . "VALUES ('$uname', '$pword', '$mail', '$phone', '$addr')";
                                                        if ($conn->query($sql)) {
                                                            ?>
                                                            <span>Đăng ký thành công.</span>
                                                        <?php } else {
                                                            ?>
                                                            <span>Đăng ký thất bại.</span>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <span>Vui lòng nhập email.</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p>
                                            <label>Số điện thoại </label>
                                            <input type="tel" name="phone">
                                        </p>
                                        <p>
                                            <label>Địa chỉ </label>
                                            <input type="text" name="addr">
                                        </p>
                                        <div class="login_submit">
                                            <button type="submit" name="register">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--register area end-->
                        </div>
                    </div>
                    <!-- customer login end -->

                </div>
                <!--pos page inner end-->
            </div>
        </div>
        <!--pos page end-->

        <!--footer area start-->
        <div class="footer_area">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Về chúng tôi</h3>
                                <p>BookStore là nơi cung cấp các đầu sách mới mẻ, phong phú, nắm bắt thị trường nhanh chóng
                                    cả trong lẫn ngoài nước. <br> Đến với BookStore - đến với sự kì diệu trong từng con chữ.
                                </p>
                                <div class="footer_widget_contect">
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>01 Lý Tự Trọng, Quận Ninh Kiều,
                                        TP. Cần Thơ</p>
                                    <p><i class="fa fa-mobile" aria-hidden="true"></i>+84 292 383 5581</p>
                                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i>cusc@ctu.edu.vn</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Tài khoản của bạn</h3>
                                <ul>
                                    <li><a href="login.php">Đăng ký</a></li>
                                    <li><a href="login.php">Đăng nhập</a></li>
                                    <li><a href="account.php">Tài khoản của bạn</a></li>
                                    <li><a href="wishlist.php">Sách yêu thích của bạn</a></li>
                                    <li><a href="cart.php">Giỏ hàng của bạn</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Danh mục</h3>
                                <ul>
                                    <li><a href="products-all.php">Theo thể loại</a></li>
                                    <li><a href="products-all.php">Theo ngôn ngữ</a></li>
                                    <li><a href="products-all.php">Theo tác giả</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer_widget">
                                <h3>Truy cập nhanh</h3>
                                <ul>
                                    <li><a href="index.php">Trang chủ</a></li>
                                    <li><a href="intro.php">Giới thiệu</a></li>
                                    <li><a href="feedback.php">Góp ý</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright_area">
                                <p>&copy; <a href="index.php">BookStore</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer_social text-right">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"
                                                                         aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer area end-->

        <!-- all js here -->
        <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
        <script src="assets\js\popper.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\ajax-mail.js"></script>
        <script src="assets\js\plugins.js"></script>
        <script src="assets\js\main.js"></script>
    </body>

</html>