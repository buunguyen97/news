<ul class="blog column column_1_2">
    <?php while($row = $kq->fetch_assoc() ) { ?>
    <li class="post tinmoinhat">
        <a href="index.php?p=detail&idTin=<?=$row['idTin'];?>" title="Nuclear Fusion Closer to Becoming a Reality">
            <img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
        </a>
        <h2 class="with_number">
            <a href="index.php?p=detail&idTin=<?=$row['idTin'];?>" title="Nuclear Fusion Closer to Becoming a Reality"><?=$row['TieuDe']?> </a>
            <a class="comments_number" href="post_small_image.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
        </h2>
        <ul class="post_details">
            <li class="category"><a href="category_world.html" title="WORLD"><?=$row['TenLT']?> </a></li>
            <li class="date">
                <?=date( 'd/m/Y', strtotime($row['Ngay']) )?>
            </li>
        </ul>
        <p><?=$row['TomTat']?> </p>

    </li>
    <?php }?>
</ul>
