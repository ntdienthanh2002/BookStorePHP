<?php

class Donhang {

    private $dh_ma;
    private $tknd_ma;

    public function __construct($dh_ma, $tknd_ma) {
        $this->dh_ma = $dh_ma;
        $this->tknd_ma = $tknd_ma;
    }

    public function getOrderNew($conn) {
        $sql = "SELECT dh_ma FROM donhang ORDER BY dh_ma DESC LIMIT 1";
        $result = $conn->query($sql);
        return $result;
    }

}

?>
