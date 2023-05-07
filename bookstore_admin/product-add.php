<?php
require_once './dbconnect.php';
require_once './data/author_data.php';
require_once './data/category_data.php';
require_once './data/language_data.php';
require_once './data/publishing_data.php';
?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BookStore Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
                    ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Google Fonts
                    ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- owl.carousel CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <!-- animate CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- normalize CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- meanmenu icon CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- main CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/main.css">
        <!-- educate icon CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/educate-custon-icon.css">
        <!-- morrisjs CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/morrisjs/morris.css">
        <!-- mCustomScrollbar CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- metisMenu CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
        <!-- calendar CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
        <!-- x-editor CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/editor/select2.css">
        <link rel="stylesheet" href="css/editor/datetimepicker.css">
        <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
        <link rel="stylesheet" href="css/editor/x-editor-style.css">
        <!-- normalize CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
        <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
        <!-- style CSS
                    ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS
                    ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS
                    ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!-- Start Left menu area -->
        <div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="index.php"><img class="main-logo" src="img/logo/logo.jpg" alt="" /></a>
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li>
                                <a class="has-arrow" href="product-all.php" aria-expanded="false"><span class="mini-click-non">Sản phẩm</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a href="product-all.php"><span class="mini-sub-pro">Tất cả sản phẩm</span></a></li>
                                    <li><a href="product-add.php"><span class="mini-sub-pro">Thêm sản phẩm</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="author-all.php" aria-expanded="false"><span class="mini-click-non">Tác giả</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a href="author-all.php"><span class="mini-sub-pro">Tất cả tác giả</span></a></li>
                                    <li><a href="author-add.php"><span class="mini-sub-pro">Thêm tác giả</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="category-all.php" aria-expanded="false"><span class="mini-click-non">Thể loại</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a href="category-all.php"><span class="mini-sub-pro">Tất cả thể loại</span></a></li>
                                    <li><a href="category-add.php"><span class="mini-sub-pro">Thêm thể loại</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="publishing-all.php" aria-expanded="false"><span class="mini-click-non">Nhà xuất bản</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a href="publishing-all.php"><span class="mini-sub-pro">Tất cả nhà xuất bản</span></a></li>
                                    <li><a href="publishing-add.php"><span class="mini-sub-pro">Thêm nhà xuất bản</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="language-all.php" aria-expanded="false"><span class="mini-click-non">Ngôn ngữ</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a href="language-all.php"><span class="mini-sub-pro">Tất cả ngôn ngữ</span></a></li>
                                    <li><a href="language-add.php"><span class="mini-sub-pro">Thêm ngôn ngữ</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="user-all.php" aria-expanded="false"><span class="mini-click-non">Tài khoản người dùng</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="orders-all.php" aria-expanded="false"><span class="mini-click-non">Đơn hàng</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="orders-details-all.php" aria-expanded="false"><span class="mini-click-non">Chi tiết đơn hàng</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="feedback-all.php" aria-expanded="false"><span class="mini-click-non">Góp ý</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- End Left menu area -->

        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro">
                                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <!-- Mobile Menu start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul class="mobile-menu-nav">
                                            <li><a data-toggle="collapse" data-target="#Charts" href="product-all.php">Sản phẩm<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul class="collapse dropdown-header-top">
                                                    <li><a href="product-all.php">Tất cả sản phẩm</a></li>
                                                    <li><a href="product-add.php">Thêm sản phẩm</a></li>
                                                </ul>
                                            </li>
                                            <li><a data-toggle="collapse" data-target="#demoevent" href="author-all.php">Tác giả<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul id="demoevent" class="collapse dropdown-header-top">
                                                    <li><a href="author-all.php">Tất cả tác giả</a></li>
                                                    <li><a href="author-add.php">Thêm tác giả</a></li>
                                                </ul>
                                            </li>
                                            <li><a data-toggle="collapse" data-target="#demopro" href="category-all.php">Thể loại<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul id="demopro" class="collapse dropdown-header-top">
                                                    <li><a href="category-all.php">Tất cả thể loại</a></li>
                                                    <li><a href="category-add.php">Thêm thể loại</a></li>
                                                </ul>
                                            </li>
                                            <li><a data-toggle="collapse" data-target="#democrou" href="publishing-all.php">Nhà xuất bản<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul id="democrou" class="collapse dropdown-header-top">
                                                    <li><a href="publishing-all.php">Tất cả nhà xuất bản</a></li>
                                                    <li><a href="publishing-add.php">Thêm nhà xuất bản</a></li>
                                                </ul>
                                            </li>
                                            <li><a data-toggle="collapse" data-target="#demolibra" href="language-all.php">Ngôn ngữ<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul id="demolibra" class="collapse dropdown-header-top">
                                                    <li><a href="language-all.php">Tất cả ngôn ngữ</a></li>
                                                    <li><a href="language-add.php">Thêm ngôn ngữ</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a data-toggle="collapse" data-target="#demodepart" href="user-all.php">Tài khoản người dùng<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            </li>
                                            <li>
                                                <a data-toggle="collapse" data-target="#demomi" href="orders-all.php">Đơn hàng<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            </li>
                                            <li>
                                                <a data-toggle="collapse" data-target="#Miscellaneousmob" href="orders-details-all.php">Chi tiết đơn hàng<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            </li>
                                            <li>
                                                <a data-toggle="collapse" data-target="#Pagemob" href="feedback-all.php">Góp ý<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="">Thêm sản phẩm</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <form id="add-department" action="" class="add-department" method="post" enctype="multipart/form-data">
                                                        <?php
                                                        $author = new Tacgia("", "");
                                                        $category = new Theloai("", "");
                                                        $language = new Ngonngu("", "");
                                                        $publishing = new Nhaxuatban("", "");

                                                        $resultAu = $author->showAllAuthors($conn);
                                                        $resultCa = $category->showAllCategories($conn);
                                                        $resultLa = $language->showAllLanguages($conn);
                                                        $resultPu = $publishing->showAllPublishing($conn);
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="namepro" type="text" class="form-control" placeholder="Tên sản phẩm">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $product = trim($_POST['namepro']);
                                                                        if ($product == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập tên sản phẩm.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="author" class="form-control">
                                                                        <option value="">Tác giả</option>
                                                                        <?php
                                                                        while ($rowAu = $resultAu->fetch_assoc()) {
                                                                            ?>
                                                                            <option value="<?php echo $rowAu['tg_ma'] ?>"><?php echo $rowAu['tg_ten'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $author = trim($_POST['author']);
                                                                        if ($author == "") {
                                                                            ?>
                                                                            <span>Vui lòng chọn tác giả.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="publishing" class="form-control">
                                                                        <option value="">Nhà xuất bản</option>
                                                                        <?php
                                                                        while ($rowPu = $resultPu->fetch_assoc()) {
                                                                            ?>
                                                                            <option value="<?php echo $rowPu['nxb_ma'] ?>"><?php echo $rowPu['nxb_ten'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $publishing = trim($_POST['publishing']);
                                                                        if ($publishing == "") {
                                                                            ?>
                                                                            <span>Vui lòng chọn nhà xuất bản.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="language" class="form-control">
                                                                        <option value="">Ngôn ngữ</option>
                                                                        <?php
                                                                        while ($rowLa = $resultLa->fetch_assoc()) {
                                                                            ?>
                                                                            <option value="<?php echo $rowLa['nn_ma'] ?>"><?php echo $rowLa['nn_ten'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $language = trim($_POST['language']);
                                                                        if ($language == "") {
                                                                            ?>
                                                                            <span>Vui lòng chọn ngôn ngữ.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="category" class="form-control">
                                                                        <option value="">Thể loại</option>
                                                                        <?php
                                                                        while ($rowCa = $resultCa->fetch_assoc()) {
                                                                            ?>
                                                                            <option value="<?php echo $rowCa['tl_ma'] ?>"><?php echo $rowCa['tl_ten'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $category = trim($_POST['category']);
                                                                        if ($category == "") {
                                                                            ?>
                                                                            <span>Vui lòng chọn thể loại.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="size" type="text" class="form-control" placeholder="Kích thước (ví dụ: 12 x 15)">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $size = trim($_POST['size']);
                                                                        if ($size == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập kích thước.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="pagenum" type="number" class="form-control" placeholder="Số trang">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $pagenum = trim($_POST['pagenum']);
                                                                        if ($pagenum == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập số trang.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="form" class="form-control">
                                                                        <option value="">Hình thức</option>
                                                                        <option value="Bìa cứng">Bìa cứng</option>
                                                                        <option value="Bìa mềm">Bìa mềm</option>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $form = trim($_POST['form']);
                                                                        if ($form == "") {
                                                                            ?>
                                                                            <span>Vui lòng chọn hình thức.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="price" type="number" class="form-control" placeholder="Giá">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $price = trim($_POST['price']);
                                                                        if ($price == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập giá.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="quantity" type="number" class="form-control" placeholder="Số lượng">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $quantity = trim($_POST['quantity']);
                                                                        if ($quantity == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập số lượng.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea name="description" class="form-control" placeholder="Mô tả"></textarea>
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $des = trim($_POST['description']);
                                                                        if ($des == "") {
                                                                            ?>
                                                                            <span>Vui lòng nhập mô tả.</span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="img" type="file" class="form-control">
                                                                    <?php
                                                                    if (isset($_POST['add'])) {
                                                                        $discount = trim($_POST['discount']);
                                                                        if (@getimagesize($_FILES['img']['tmp_name']) == false) {
                                                                            ?>
                                                                            <span>Vui lòng chọn hình ảnh.</span>
                                                                            <?php
                                                                        } else {
                                                                            $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                                                                            if ($discount == "") {
                                                                                $sql = "INSERT INTO sanpham (sp_ten, tg_ma, nxb_ma, nn_ma, tl_ma, sp_kichthuoc, sp_sotrang, sp_hinhthuc, sp_gia, sp_soluongtonkho, sp_mota, sp_hinhanh, sp_giamgia)"
                                                                                        . " VALUES ('$product', $author, $publishing, $language, $category, '$size', $pagenum, '$form', $price, $quantity, '$des', '$image', 0)";
                                                                                if ($conn->query($sql)) {
                                                                                    ?>
                                                                                    <span>Thêm sản phẩm mới thành công.</span>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <span>Thêm sản phẩm mới thất bại.</span>
                                                                                    <?php
                                                                                }
                                                                            } else {
                                                                                $sql = "INSERT INTO sanpham (sp_ten, tg_ma, nxb_ma, nn_ma, tl_ma, sp_kichthuoc, sp_sotrang, sp_hinhthuc, sp_gia, sp_soluongtonkho, sp_mota, sp_hinhanh, sp_giamgia)"
                                                                                        . " VALUES ('$product', $author, $publishing, $language, $category, '$size', $pagenum, '$form', $price, $quantity, '$des', '$image', $discount)";
                                                                                if ($conn->query($sql)) {
                                                                                    ?>
                                                                                    <span>Thêm sản phẩm mới thành công.</span>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <span>Thêm sản phẩm mới thất bại.</span>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="discount" type="number" class="form-control" placeholder="Giảm giá (ví dụ: 10)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button name="add" type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
                                                                </div>
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
                </div>
            </div>
            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="footer-copy-right">
                                <p> &copy; <a href="index.php">BookStore</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jquery
                    ============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
                    ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
                    ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
                    ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
                    ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
                    ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS
                    ============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS
                    ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
                    ============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
                    ============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- morrisjs JS
                    ============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/jquery.charts-sparkline.js"></script>
        <!-- calendar JS
                    ============================================ -->
        <script src="js/calendar/moment.min.js"></script>
        <script src="js/calendar/fullcalendar.min.js"></script>
        <script src="js/calendar/fullcalendar-active.js"></script>
        <!-- form validate JS
                    ============================================ -->
        <script src="js/form-validation/jquery.form.min.js"></script>
        <script src="js/form-validation/jquery.validate.min.js"></script>
        <script src="js/form-validation/form-active.js"></script>
        <!-- tab JS
                    ============================================ -->
        <script src="js/tab.js"></script>
        <!-- plugins JS
                    ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS
                    ============================================ -->
        <script src="js/main.js"></script>
    </body>

</html>