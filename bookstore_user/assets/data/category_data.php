<?php

class Theloai {

    private $tl_ma;
    private $tl_ten;

    public function __construct($tl_ma, $tl_ten) {
        $this->tl_ma = $tl_ma;
        $this->tl_ten = $tl_ten;
    }

    public function showAllCategories($conn) {
        $sql = "SELECT tl_ma, tl_ten FROM theloai ORDER BY tl_ten";
        $result = $conn->query($sql);
        return $result;
    }

}

?>