<?php

class Ngonngu {

    private $nn_ma;
    private $nn_ten;

    public function __construct($nn_ma, $nn_ten) {
        $this->nn_ma = $nn_ma;
        $this->nn_ten = $nn_ten;
    }

    public function showAllLanguages($conn) {
        $sql = "SELECT nn_ma, nn_ten FROM ngonngu";
        $result = $conn->query($sql);
        return $result;
    }

}

?>