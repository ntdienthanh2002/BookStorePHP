<?php

class Sanpham {

    private $sp_ma;
    private $sp_ten;

    public function __construct($sp_ma, $sp_ten) {
        $this->sp_ma = $sp_ma;
        $this->sp_ten = $sp_ten;
    }

    public function showAllProducts($conn) {
        $sql = "SELECT sp_ma, sp_ten, tg_ma, nxb_ma, nn_ma, tl_ma, sp_kichthuoc, sp_sotrang, sp_hinhthuc, sp_gia, sp_soluongtonkho, sp_mota, sp_hinhanh, sp_giamgia FROM sanpham";
        $result = $conn->query($sql);
        return $result;
    }

}

?>
