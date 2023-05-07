<?php

class Taikhoannguoidung {

    private $tknd_ma;
    private $tknd_tendangnhap;

    public function __construct($tknd_ma, $tknd_tendangnhap) {
        $this->tknd_ma = $tknd_ma;
        $this->tknd_tendangnhap = $tknd_tendangnhap;
    }

    public function showAllUsers($conn) {
        $sql = "SELECT tknd_ma, tknd_tendangnhap, tknd_email, tknd_sodienthoai, tknd_diachi FROM taikhoannguoidung";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>