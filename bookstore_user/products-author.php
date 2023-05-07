<?php
session_start();
require_once './dbconnect.php';
require_once './assets/data/product_data.php';
require_once './assets/data/category_data.php';
require_once './assets/data/language_data.php';
require_once './assets/data/author_data.php';
?>
<!--add product-->
<?php
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $stmt = $conn->prepare("select sp_ma, sp_ten, sp_gia from sanpham where sp_ma = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if (isset($result['sp_ma']) && $result['sp_ma']) {
            $_SESSION['cart'][$result['sp_ma']] = array("quantity" => 1, "price" => $result['sp_gia']);
        } else {
            $message = "Sản phẩm không hợp lệ";
        }
    }
}
?>
<!-- display by author -->
<?php
if (isset($_GET['action']) && $_GET['action'] == "author") {
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
                                        <li>Thể loại</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--breadcrumbs area end-->

                    <!--pos home section-->
                    <div class=" pos_home_section shop_section shop_fullwidth">
                        <!--shop tab product-->
                        <div class="shop_tab_product shop_fullwidth">   
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                    <?php
                                    $stmt = $conn->prepare("SELECT sp_ma, sp_ten, sp_hinhanh, sp_gia, tg_ma FROM sanpham WHERE tg_ma = $id");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result->num_rows > 0) {
                                        ?>
                                        <div class="row">
                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['sp_hinhanh']) ?>" alt=""> 
                                                            <div class="product_action">
                                                                <a href="cart.php?action=add&id=<?php echo $row['sp_ma'] ?>"> <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price"><?php echo number_format($row['sp_gia'], 0, '', ',') ?> đ</span>
                                                            <h3 class="product_title"><?php echo $row['sp_ten'] ?></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href="wishlist.php?action=addwishlist&id=<?php echo $row['sp_ma'] ?>" title="Thêm vào yêu thích">Thêm vào yêu thích</a></li>
                                                                <li><a href="product-details.php?action=view&id=<?php echo $row['sp_ma'] ?>" title="Xem chi tiết">Xem chi tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>  
                                        <?php
                                    } else {
                                        ?>
                                        <p>Hiện chưa có sản phẩm của tác giả này.<p>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>    
                        <!--shop tab product end-->
                    </div>
                    <!--pos home section end-->
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
