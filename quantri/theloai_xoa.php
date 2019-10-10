<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt-> checkLogin();
$idTL = $_GET['idTL']; settype($idTL,"int");


$dem = $qt->DemTheLoaiTrongTin($idTL);



 if($dem > 0){

        $_SESSION['theloai_xoa']="Không thể xóa !!! ";
        header("location:index.php?p=theloai_ds");


 }
 else{
     $kq = $qt->TheLoai_Xoa($idTL);
     $_SESSION['theloai_xoa']="Xóa Thành Công !!!";
     header("location:index.php?p=theloai_ds");
 }

?>