<?php $kq = $t->TinNoiBat(4,6,$lang); ?>
<ul class="blog medium">
    <?php while ($row = $kq->fetch_assoc() ) { ?>
    <li class="post">
        <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="High Altitudes May Aid Weight Control">
            <span class="icon gallery"></span>
            <img class="hinhtinnoibattt" src='<?= $row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <h5><a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" class="tieudetinnoibattt" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></h5>
        <ul class="post_details simple">
            <li class="category"><a href="category_health.html" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
            <li class="date">
                <?=date('d/m/Y',strtotime($row['Ngay']))?>
            </li>
        </ul>
    </li>
    <?php } ?>
</ul>