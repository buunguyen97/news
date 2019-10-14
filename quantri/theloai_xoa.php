<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt-> checkLogin();
$idTL = $_GET['idTL']; settype($idTL,"int");


$dem = $qt->DemTheLoaiTrongTin($idTL);



 if($dem > 0){

        $_SESSION['theloai_xoa']=0;
        header("location:index.php?p=theloai_ds");


 }
 else{
     $kq = $qt->TheLoai_Xoa($idTL);
     $_SESSION['theloai_xoa']=1;
     header("location:index.php?p=theloai_ds");
 }

?>