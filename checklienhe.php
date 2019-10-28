<?php


if (isset($_POST['name']) ==true){

    $ht=htmlentities(trim(strip_tags($_POST['name'])),ENT_QUOTES,'utf-8');
    $m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
    $td=htmlentities(trim(strip_tags($_POST['subject'])),ENT_QUOTES,'utf-8');
    $nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
    $nd= nl2br($nd);
    $loi="";
    $cap = $_POST['cap'];
    if ($cap!= $_SESSION['cap']) $loi.="Bạn nhập chữ không đúng với hình<br>";
    if ($ht=="") $loi.="Bạn chưa nhập họ tên<br>";
    if ($m=="") $loi.="Bạn chưa nhập email<br>";
    if ($nd=="") $loi.="Bạn chưa nhập nội dung liên hệ<br>";
    else if (strlen($nd)<=10) $loi.="Nội dung liên hệ quá ngắn<br>";
    if ($loi==""){
        $to ="buulenguyen@gmail.com";
        $from="bebuu97@gmail.com";
        $pass="Be03101997";
        $topText="Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}" ;
        $nd = $topText."<br>Nội dung:<hr>".$nd;
        $error="";
        $t->GuiMail($to, $from,$fromName="BQT",$td,$nd,$from,$pass,$error);
        if ($error!="") $loi=$error;
        else {
            $_SESSION['camon'] ="Cảm ơn bạn. Ý kiến đã được ghi nhận";
            echo "<script>document.location='/news/lien-he/';</script>";
            exit();
        }
    }
}
?>