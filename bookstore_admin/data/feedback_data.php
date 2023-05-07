<?php

class Gopy {

    private $gy_ma;
    private $tknd_ma;

    public function __construct($gy_ma, $tknd_ma) {
        $this->gy_ma = $gy_ma;
        $this->tknd_ma = $tknd_ma;
    }

    public function showAllFeedbacks($conn) {
        $sql = "SELECT gy_ma, tknd_ma, sp_ma, gy_ngay, gy_noidung FROM gopy";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>