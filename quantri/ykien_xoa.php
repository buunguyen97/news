<?php
session_start();
require_once "../class/quantritin.php";
$kq = new quantritin();
$kq -> checkLogin();
$idYKien = $_GET['idYKien'];
settype($idYKien,"int");
$k = $kq->YKien_Xoa($idYKien);
$_SESSION['success']=1;
header("location:index.php?p=ykien_ds");