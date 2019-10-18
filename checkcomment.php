<?php
require_once "class/tin.php";
$t = new tin();

$data = ['result' => 'khong'];
$loi="";
if (isset($_POST['name']) ==true) { 
    $hoten = $_POST['name'];
    $email = $_POST['email'];
    $noidung = $_POST['message'];
    $idTin = $_POST['idTin']; 		
    $kq= $t->LuuYKien($idTin, $hoten, $email, $noidung, $loi);
    if ($loi=="") {
        $_SESSION['thongbao']=1;
        $data =  ['result' => 'co'];

    }
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>