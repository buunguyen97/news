<?php
$idTin = $_GET['idTin']; settype($idTin,"int");
$row = $t->ChiTietTin($idTin);
$t->CapNhatSolanXemTin($idTin);
?>

<div class="row">
    <div class="post single">
        <h1 class="post_title">
            <?=$row['TieuDe']?>
        </h1>
        <ul class="post_details clearfix">
            <li class="detail category">In <a href="category_health.html" title="<?=$row['Ten']?>"><?=$row['Ten']?></a></li>
            <li class="detail date"><?=date( 'd/m/Y', strtotime($row['Ngay']) )?></li>

            <li class="detail views"><?=$row['SoLanXem']?> lần xem.</li>

        </ul>

        <div class="post_content noidungtin clearfix">
            <div class="content_box">
                <h3 class="excerpt"><?=$row['TomTat']?>.</h3>
                <div class="text">
                    <?=$row['Content']?>
                </div>
            </div>

        </div>
    </div>
</div>