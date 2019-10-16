<?php
$tenLT = $t->LayTenLoaiTin($idLT);
$kq = $t->TinMoiTrong1Loai($idLT, 0, 1, $lang);
$row=$kq -> fetch_assoc();
?>

<h4 class="box_header">Lifestyle</h4>
<ul class="blog small_margin clearfix">
    <li class="post tinmoinhattrongloai">
        <a href="index.php?p=detail&idTin=<?=$row['idTin'];?>" title="The Public Health Crisis Hiding in Our Food">
            <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <div class="post_content">
            <h5>
                <a href="index.php?p=detail&idTin=<?=$row['idTin'];?>" title="The Public Health Crisis Hiding in Our Food"><?=$row['TieuDe']?> </a>
            </h5>

        </div>
    </li>
</ul>
<?php $kq = $t->TinMoiTrong1Loai($idLT, 1,5, $lang);?>
<ul class="list tinmoitieptheo">
    <?php while($row = $kq->fetch_assoc() ) { ?>
    <li class="bullet style_1"><a href="index.php?p=detail&idTin=<?=$row['idTin'];?>" title="Climate Change Debate While Britain Floods"><?=$row['TieuDe']?> </a></li>

    <?php } ?>
</ul>