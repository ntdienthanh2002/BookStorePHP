<?php
session_start();
require_once './dbconnect.php';
require_once './assets/data/product_data.php';
require_once './assets/data/category_data.php';
require_once './assets/data/language_data.php';
require_once './assets/data/author_data.php';
?>
<?php
if (isset($_GET['action']) && $_GET['action'] == "vieworder") {
    $id = intval($_GET['id']);
}
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
                                        <li>Chi tiết đơn hàng</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--breadcrumbs area end-->

                    <!-- Start Maincontent  -->
                    <section class="main_content_area">
                        <div class="account_dashboard">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <!-- Nav tabs -->
                                    <div class="dashboard_tab_button">
                                        <ul role="tablist" class="nav flex-column dashboard-list">
                                            <li> <a href="#orders" data-toggle="tab" class="nav-link active">Các đơn hàng</a></li>
                                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Cập nhật thông tin</a></li>
                                            <li><a href="#address" data-toggle="tab" class="nav-link">Đổi mật khẩu</a></li>
                                            <li><a href="logout.php" class="nav-link">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-9">
                                    <!-- Tab panes -->
                                    <div class="tab-content dashboard_content">
                                        <div class="tab-pane fade show active" id="orders">
                                            <h3>Chi tiết đơn hàng của bạn</h3>
                                            <div class="coron_table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Giá</th>
                                                            <th>Số lượng mua</th>
                                                            <th>GIảm giá</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total_price = 0;
                                                        $stmt = $conn->prepare("SELECT sp_ten, ctdh_gia, ctdh_soluong, ctdh_giamgia FROM chitietdonhang JOIN sanpham ON sanpham.sp_ma = chitietdonhang.sp_ma WHERE dh_ma = $id");
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['sp_ten'] ?></td>
                                                                <td><?php echo number_format($row['ctdh_gia'], 0, '', ',') ?> đ</td>
                                                                <td><?php echo $row['ctdh_soluong'] ?></td>
                                                                <?php
                                                                if ($row['ctdh_giamgia'] > 0) {
                                                                    ?>
                                                                    <td><?php echo $row['ctdh_giamgia'] ?> %</td>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <td>-</td>
                                                                <?php } ?>

                                                                <?php
                                                                if ($row['ctdh_giamgia'] > 0) {
                                                                    $total_price += ($row['ctdh_gia'] - ($row['ctdh_gia'] * ($row['ctdh_giamgia'] / 100))) * $row['ctdh_soluong'];
                                                                    ?>
                                                                    <td><?php echo number_format(($row['ctdh_gia'] - ($row['ctdh_gia'] * ($row['ctdh_giamgia'] / 100))) * $row['ctdh_soluong'], 0, '', ',') ?> đ</td>
                                                                    <?php
                                                                } else {
                                                                    $total_price += $row['ctdh_gia'] * $row['ctdh_soluong'];
                                                                    ?>
                                                                    <td><?php echo number_format($row['ctdh_gia'] * $row['ctdh_soluong'], 0, '', ',') ?> đ</td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Tổng tiền</td>
                                                            <td><strong><?php echo number_format($total_price, 0, '', ',') ?> đ</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="save_button primary_btn default_button">
                                                    <div class="login_submit">
                                                        <form action="account.php">
                                                            <button type="submit" name="save">Trở lại</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-details">
                                            <h3>Cập nhật thông tin của bạn</h3>
                                            <?php
                                            $uid = $_SESSION['uid'];
                                            $stmt = $conn->prepare("SELECT tknd_tendangnhap, tknd_email, tknd_sodienthoai, tknd_diachi FROM taikhoannguoidung WHERE tknd_ma = '$uid'");
                                            $stmt->execute();
                                            $result = $stmt->get_result()->fetch_assoc();
                                            ?>
                                            <div class="login">
                                                <div class="login_form_container">
                                                    <div class="account_login_form">
                                                        <form action="" method="post">
                                                            <label>Tên đăng nhập</label>
                                                            <input type="text" name="uname" value="<?php echo $result['tknd_tendangnhap'] ?>">
                                                            <?php
                                                            $uid = $_SESSION['uid'];
                                                            if (isset($_POST['save'])) {
                                                                $uname = trim($_POST['uname']);
                                                                if ($uname == "") {
                                                                    ?>
                                                                    <span>Vui lòng nhập tên đăng nhập.</span><br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <label>Email</label>
                                                            <input type="email" name="mail" value="<?php echo $result['tknd_email'] ?>">
                                                            <?php
                                                            if (isset($_POST['save'])) {
                                                                $mail = trim($_POST['mail']);
                                                                if ($mail == "") {
                                                                    ?>
                                                                    <span>Vui lòng nhập email.</span><br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <label>Số điện thoại</label>
                                                            <input type="tel" name="phone" value="<?php echo $result['tknd_sodienthoai'] ?>">
                                                            <?php
                                                            if (isset($_POST['save'])) {
                                                                $phone = trim($_POST['phone']);
                                                            }
                                                            ?>
                                                            <label>Địa chỉ</label>
                                                            <input type="text" name="addr" value="<?php echo $result['tknd_diachi'] ?>">
                                                            <?php
                                                            if (isset($_POST['save'])) {
                                                                $addr = trim($_POST['addr']);
                                                                if ($uname != "" && $mail != "") {
                                                                    $stmt = $conn->prepare("UPDATE taikhoannguoidung SET tknd_tendangnhap = '$uname', tknd_email = '$mail', tknd_sodienthoai = $phone, tknd_diachi = '$addr' WHERE tknd_ma = $uid");
                                                                    if ($stmt->execute()) {
                                                                        ?>
                                                                        <span>Cập nhật thông tin thành công.</span>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <span>Cập nhật thông tin thất bại.</span>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <br>
                                                            <div class="save_button primary_btn default_button">
                                                                <div class="login_submit">
                                                                    <button type="submit" name="save">Lưu</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <h3>Đổi mật khẩu tài khoản của bạn</h3>
                                            <div class="login">
                                                <div class="login_form_container">
                                                    <div class="account_login_form">
                                                        <form action="" method="post">
                                                            <label>Mật khẩu cũ <span>*</span></label>
                                                            <input type="password" name="pwordold">
                                                            <?php
                                                            $uid = $_SESSION['uid'];
                                                            $stmt = $conn->prepare("SELECT tknd_matkhau FROM taikhoannguoidung WHERE tknd_ma = $uid");
                                                            $stmt->execute();
                                                            $result = $stmt->get_result()->fetch_assoc();

                                                            if (isset($_POST['change'])) {
                                                                $pwordold = trim($_POST['pwordold']);
                                                                if ($pwordold == "") {
                                                                    ?>
                                                                    <span>Vui lòng nhập mật khẩu cũ.</span><br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <label>Mật khẩu mới <span>*</span></label>
                                                            <input type="password" name="pwordnew">
                                                            <?php
                                                            if (isset($_POST['change'])) {
                                                                $pwordnew = trim($_POST['pwordnew']);
                                                                if ($pwordnew == "") {
                                                                    ?>
                                                                    <span>Vui lòng nhập mật khẩu mới.</span><br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <label>Nhập lại mật khẩu mới <span>*</span></label>
                                                            <input type="password" name="pwordcfm">
                                                            <?php
                                                            if (isset($_POST['change'])) {
                                                                $pwordcfm = trim($_POST['pwordcfm']);
                                                                if ($pwordcfm == "") {
                                                                    ?>
                                                                    <span>Vui lòng nhập lại mật khẩu mới.</span><br>
                                                                    <?php
                                                                } else if ($pwordnew != $pwordcfm) {
                                                                    ?>
                                                                    <span>Mật khẩu mới được nhập lại không chính xác.</span><br>
                                                                    <?php
                                                                } else {
                                                                    if ($pwordold == $result['tknd_matkhau']) {
                                                                        $stmt2 = $conn->prepare("UPDATE taikhoannguoidung SET tknd_matkhau = '$pwordnew' WHERE tknd_ma = $uid");
                                                                        if ($stmt2->execute()) {
                                                                            ?>
                                                                            <span>Đổi mật khẩu thành công.</span><br>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <span>Đôi mật khẩu thất bại.</span><br>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <span>Mật khẩu cũ không chính xác.</span><br>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <br>
                                                            <div class="save_button primary_btn default_button">
                                                                <div class="login_submit">
                                                                    <button type="submit" name="change">Đổi</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Maincontent  -->
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