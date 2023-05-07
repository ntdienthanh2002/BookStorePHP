<?php

require_once './dbconnect.php';
?>
<?php

if (isset($_GET['action']) && $_GET['action'] == "feedback") {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM gopy WHERE gy_ma = $id";
    $result = $conn->query($sql);
    header("location:products-all.php");
}
?>