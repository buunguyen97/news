
<?php $kq = $t-> TinMoiCoPhanHoi(0, 10, $lang);?>
<div id="most-commented">
    <div class="horizontal_carousel_container page_margin_top">
        <ul class="blog horizontal_carousel page_margin_top autoplay-0 visible-4 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
            <?php while($row = $kq->fetch_assoc() ) { ?>
            <li class="post tinmoiphanhoi">
                <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="Escape From Planet Earth: The Movie">
                    <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
                </a>
                <h5><span class="number"><?=++$demTMPH?>.</span><a href="post_quote.html" title="Escape From Planet Earth: The Movie"><?=$row['TieuDe']?> </a></h5>
                <ul class="post_details simple">
                    <li class="category"><a href="category_health.html" title="HEALTH"><?=$row['TenLT']?></a></li>
                    <li class="date">
                        <?=date( 'd/m/Y', strtotime($row['Ngay']) )?>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <li class="post first">
                <a href="bv/<?=$row['TieuDe_KhongDau'];?>.html" title="High Altitudes May Aid Weight Control">
                    <img src='images/samples/330x242/image_05.jpg' alt='img'>
                </a>
                <h5><span class="number">4.</span><a href="post_small_image.html" title="High Altitudes May Aid Weight Control">High Altitudes May Aid Weight Control</a></h5>
                <ul class="post_details simple">
                    <li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
                    <li class="date">
                        10:11 PM, Feb 02
                    </li>
                </ul>
            </li>
            <li class="post first">
                <a href="post.html" title="New Painkiller Rekindles Addiction Concerns">
                    <img src='images/samples/330x242/image_07.jpg' alt='img'>
                </a>
                <h5><span class="number">5.</span><a href="post.html" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a></h5>
                <ul class="post_details simple">
                    <li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
                    <li class="date">
                        10:11 PM, Feb 02
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>