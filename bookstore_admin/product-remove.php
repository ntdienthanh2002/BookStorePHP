<?php

require_once './dbconnect.php';
?>
<?php

if (isset($_GET['action']) && $_GET['action'] == "remove") {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM sanpham WHERE sp_ma = $id";
    $result = $conn->query($sql);
    header("location:product-all.php");
}
?>