<?php

class Tacgia {

    private $tg_ma;
    private $tg_ten;

    public function __construct($tg_ma, $tg_ten) {
        $this->tg_ma = $tg_ma;
        $this->tg_ten = $tg_ten;
    }

    public function showAllAuthors($conn) {
        $sql = "SELECT tg_ma, tg_ten FROM tacgia ORDER BY tg_ten";
        $result = $conn->query($sql);
        return $result;
    }

}

?>