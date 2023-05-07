<?php

class Donhang {

    private $dh_ma;
    private $tknd_ma;

    public function __construct($dh_ma, $tknd_ma) {
        $this->dh_ma = $dh_ma;
        $this->tknd_ma = $tknd_ma;
    }

    public function showAllOrders($conn) {
        $sql = "SELECT dh_ma, tknd_ma, dh_ngaydathang, dh_ngaygiaohang, dh_diachigiaohang, dh_sdtgiaohang, dh_ghichu FROM donhang";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>