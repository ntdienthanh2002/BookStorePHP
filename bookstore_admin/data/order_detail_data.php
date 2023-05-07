<?php

class Chitietdonhang {

    private $dh_ma;
    private $sp_ma;

    public function __construct($dh_ma, $sp_ma) {
        $this->dh_ma = $dh_ma;
        $this->sp_ma = $sp_ma;
    }

    public function showAllOrderDetails($conn) {
        $sql = "SELECT dh_ma, sp_ma, ctdh_gia, ctdh_soluong, ctdh_giamgia FROM chitietdonhang";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>