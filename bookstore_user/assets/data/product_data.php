<?php

class Sanpham {

    private $sp_ma;
    private $sp_ten;

    public function __construct($sp_ma, $sp_ten) {
        $this->sp_ma = $sp_ma;
        $this->sp_ten = $sp_ten;
    }

    public function showAllProducts($conn) {
        $sql = "SELECT sp_ma, sp_ten, sp_hinhanh, sp_gia FROM sanpham ORDER BY sp_ten";
        $result = $conn->query($sql);
        return $result;
    }

    public function showProductsNew($conn) {
        $sql = "SELECT sp_ma, sp_ten, sp_hinhanh, sp_gia, sp_giamgia FROM sanpham ORDER BY sp_ma DESC LIMIT 5";
        $result = $conn->query($sql);
        return $result;
    }

    public function showProductsSale($conn) {
        $sql = "SELECT sp_ma, sp_ten, sp_hinhanh, sp_gia, sp_giamgia FROM sanpham where sp_giamgia > 0";
        $result = $conn->query($sql);
        return $result;
    }

    public function showProductsHot($conn) {
        $sql = "SELECT sanpham.sp_ma, sp_ten, sp_hinhanh, sp_gia, sp_giamgia, COUNT(sanpham.sp_ma) FROM chitietdonhang JOIN sanpham ON sanpham.sp_ma = chitietdonhang.sp_ma GROUP BY sanpham.sp_ma ORDER BY COUNT(sanpham.sp_ma) DESC LIMIT 5";
        $result = $conn->query($sql);
        return $result;
    }
}

?>
