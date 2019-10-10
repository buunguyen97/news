<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt-> checkLogin ();
$idLT = $_GET['idLT']; settype($idLT,"int");

$dem = $qt->DemLoaiTinTrongTin($idLT);



if($dem > 0){

    $_SESSION['loaitin_xoa']="Không thể xóa !!! ";
    header("location:index.php?p=loaitin_ds");


}
else{
    $kq = $qt->TheLoai_Xoa($idTL);
    $_SESSION['loaitin_xoa']="Xóa Thành Công !!!";
    header("location:index.php?p=loaitin_ds");
}
