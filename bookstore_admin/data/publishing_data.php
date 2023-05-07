<?php

class Nhaxuatban {

    private $nxb_ma;
    private $nxb_ten;

    public function __construct($nxb_ma, $nxb_ten) {
        $this->nxb_ma = $nxb_ma;
        $this->nxb_ten = $nxb_ten;
    }

    public function showAllPublishing($conn) {
        $sql = "SELECT nxb_ma, nxb_ten FROM nhaxuatban";
        $result = $conn->query($sql);
        return $result;
    }

}

?>