<?php $kq = $t->TinNgauNhien(10, $lang);?>
<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
    <?php while($row = $kq->fetch_assoc() ) { ?>
    <li class="post tinngaunhien">
        <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
            <span class="icon small gallery"></span>
            <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <div class="post_content">
            <h5>
                <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful"><?=$row['TieuDe']?> </a>
            </h5>
            <ul class="post_details simple">
                <li class="category"><a href="category_health.html" title="HEALTH"><?=$row['TenLT']?> </a></li>
                <li class="date">
                    <?=date( 'd/m/Y', strtotime($row['Ngay']) )?>
                </li>
            </ul>
        </div>
    </li>
    <?php } ?>
</ul>