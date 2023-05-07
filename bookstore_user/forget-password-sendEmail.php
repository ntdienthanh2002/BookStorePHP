<?php
session_start();
require_once './dbconnect.php';
require_once './assets/PHPMailer/PHPMailer.php';
require_once './assets/PHPMailer/SMTP.php';

if (isset($_POST['forget'])) {
    $mail = $_POST['mail'];
    $_SESSION['mail'] = $mail;
    $code = rand(1000, 32000);
    $_SESSION['code'] = $code;
    $email = new \PHPMailer\PHPMailer\PHPMailer(true);
    $email->isSMTP();
    $email->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
    $email->Host = "smtp.gmail.com";
    $email->Port = 465;
    $email->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
    $email->SMTPAuth = true;
    $email->Username = "bookstorecusc@gmail.com";
    $email->Password = "bookstore2021";
    $email->From = "bookstorecusc@gmail.com";
    $email->FromName = "CUSC BookStore";
    $email->addAddress($mail);
    $email->isHTML(true);
    $email->Subject = "CUSC BookStore";
    $email->Body = "<b>Chào bạn, </b> <br> Bạn vừa thực hiện chức năng quên mật khẩu tài khoản CUSC BookStore <br> Đây là mã code để đặt lại mật khẩu của bạn: $code <br><b> Trân trọng cảm ơn! </b>";
    try {
        $email->send();
        header("location:forget-password.php");
    } catch (Exception $ex) {
        echo 'Mailer Error: ' . $email->ErrorInfo;
    }
}
?>