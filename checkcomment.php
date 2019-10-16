<?php
require_once "class/tin.php";
$t = new tin;
$data = ['result' => 'khong'];
$loi="";
if (isset($_POST['name']) ==true) {
    $hoten = $_POST['name'];
    $email = $_POST['email'];
    $noidung = $_POST['message'];
    $idTin = $_POST['idTin'];
    $kq= $t->LuuYKien($idTin, $hoten, $email, $noidung, $loi);
    if ($loi=="") {
        $url= $_SERVER['PHP_SEFT'];
        $_SESSION['thongbao']="Cảm ơn bạn, ý kiến đã được ghi nhận";
        $data =  ['result' => 'co'];
        exit();
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>