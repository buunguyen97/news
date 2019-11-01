<?php
session_start();
require_once "class/tin.php";
$t = new tin();
$data = ['result' => 'khong'];
if (isset($_POST['namelienhe']) == true) {


    $ht = htmlentities(trim(strip_tags($_POST['namelienhe'])), ENT_QUOTES, 'utf-8');
    $m = htmlentities(trim(strip_tags($_POST['emaillienhe'])), ENT_QUOTES, 'utf-8');
    $td = htmlentities(trim(strip_tags($_POST['subject'])), ENT_QUOTES, 'utf-8');
    $nd = htmlentities(trim(strip_tags($_POST['messagelienhe'])), ENT_QUOTES, 'utf-8');
    $nd = nl2br($nd);
    $loi = "";
    $cap = $_POST['cap'];
    if (strlen($nd)<=10 ) {
        $loi="Nội dung liên hệ quá ngắn";
        echo $loi;
        return false;
    }else if ( $cap == "" ){
        $loi="Captcha chua nhap";
        echo $loi;
        return false;
    }
    else if ($_SESSION['captcha_code'] != $cap ){
        $loi="Captcha k đúng";
        echo $loi;
        return false;
    }
    else{
        $to = "buulenguyen@gmail.com";
        $from = "lebuu555@gmail.com";
        $pass = "levkeduzupwfbjjl";
        $topText = "Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}";
        $nd = $topText . "<br>Nội dung:<hr>" . $nd;
        $error = "";
        $t->GuiMail($to, $from, $fromName = "BQT", $td, $nd, $from, $pass,$error);
        $data = ['result' => 'co'];

    }

    header('Content-Type: application/json');
    echo json_encode($data);
}


?>