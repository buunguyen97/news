<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin; 
$qt-> checkLogin();
$idUser = $_GET['idUser']; 
settype($idUser,"int");
$kq = $qt->User_Xoa($idUser);
$_SESSION['success']=1;
header("location:index.php?p=user_ds");
